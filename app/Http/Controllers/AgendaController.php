<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Email;
use App\Models\Mensagem;
use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AgendaController extends Controller
{
    /**
     * @var Agenda
     * @var User
     * @var Email
     * @var Cliente
     * @var Mensagem
     * @var Empresa
     */
    public function __construct(Agenda $agenda, User $user, Email $email, Cliente $cliente, Mensagem $mensagem, Empresa $empresa)
    {
        $this->agenda = $agenda;
        $this->user = $user;
        $this->email = $email;
        $this->cliente = $cliente;
        $this->mensagem = $mensagem;
        $this->empresa = $empresa;
    }
    public function enviaremail($idcliente, $idagendamento)
    {
        $status = function ($stat) {
            switch ($stat) {
                case '1':
                    return 'Aguardando atendimento';
                    break;
                case '2':
                    return 'Em atendimento';
                    break;
                case '3':
                    return 'Cancelado';
                    break;
                case '4':
                    return 'Concluído';
                    break;
            }
        };
        try {
            $usermail = $this->email->all()->first();
            $mensagens = $this->mensagem->all()->first();
            $tecnicos = $this->user->where('id', $idagendamento['tecnico_id'])->get()->first();
            $clientes = $this->cliente->where('id_cliente', $idcliente)->get()->first();
            $empresa = $this->empresa->get()->first();
            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = "UTF-8";                     // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $usermail['usuario'];                     // SMTP username
            $mail->Password   = $usermail['senha'];                               // SMTP password
            $mail->SMTPSecure = $usermail['seguranca']; //PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = $usermail['porta'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('andersonbrasil72@gmail.com', 'Anderson Rodrigues');
            $mail->addAddress($clientes['email'], $clientes['cliente']);     // Add a recipient

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Agendamento de Serviços';
            $mail->AddEmbeddedImage(public_path('img/' . $empresa['logo']), 'logoimg', public_path('img/' . $empresa['logo']));
            // ==============Corpo do Email=======================================
            $mail->Body =
                '
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>' . $idagendamento['servico'] . '</title>
            </head>
            <body>
            <table style="border-collapse: collapse;margin-top:10px;">
            <tr><td colspan="2" style="font: 12px, verdana, sans-serif;color: #555;">
            ' . $mensagens['mensagem_agendamento'] . '</td></tr>
                <tr><td colspan="2">Número do agendamento: ' . $idagendamento['id_agenda'] . '</td></tr>
                <tr><td colspan="2">Status: <strong>' . $status($idagendamento['status']) . '</strong></td></tr>
                <tr><td colspan="2">Data - Hora: ' . formatDateTime($idagendamento['data']) . ' - ' . $idagendamento['hora'] . '</td></tr>
                <tr><td colspan="2">Serviço: ' . $idagendamento['servico'] . '</td></tr>
                <tr><td colspan="2">Detalhes: ' . $idagendamento['detalhes'] . '</td></tr>
                <tr><td colspan="2">Responsável: ' . $tecnicos['name'] . '</td></tr>
                <tr><td colspan="2">Cliente: ' . $clientes['cliente'] . '</td></tr>

                <tr>
                <td style="width:105px; border-right:1px solid #375B7E;border-top:1px solid #375B7E;">
                <img src="cid:logoimg">
                </td>
                <td style="border-top:1px solid #375B7E;padding-left:10px;">
                <h3 style="font: 14px, verdana, sans-serif;color: #555;padding: 2px;">' . $empresa['empresa'] . '</h3>
                <p style="font: 12px, verdana, sans-serif;color: #555;padding: 2px;">' . $empresa['endereco'] . ', ' . $empresa['bairro'] . '<br>
                ' . $empresa['cidade'] . '<br>
                ' . $empresa['telefone'] . '</p>
                </td>
                </tr>
                </table>
            </body>
            </html>
            ';
            $mail->AltBody = '....................................';
            $mail->send();
        } catch (Exception $e) {
            flash('<i class="fa fa-check"></i> ocorreu um erro durante o envio!' . $mail->ErrorInfo)->warning();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = '';
        $agendas = $this->agenda->orderBy('id_agenda', 'DESC')->paginate(15);

        return view('agendas.index', compact('agendas', 'term'));
    }

    /**
     * Busca de agendamentos por data
     */
    public function busca(Request $request)
    {
        $term = Carbon::createFromFormat("d/m/Y", $request->input('term'))->format("Y-m-d");
        $agendas = $this->agenda->where('data', $term)->get();
        return view('agendas.index', compact('agendas', 'term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->where('funcao', 3)->get();
        return view('agendas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'cliente_id' => 'required',
            'tecnico_id' => 'required',
            'data' => 'required',
            'hora' => 'required',
            'servico' => 'required',
            'detalhes' => 'required',
            'observacoes' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $data['data'] = Carbon::createFromFormat("d/m/Y", $request->data)->format("Y-m-d");
            $data['status'] = 1;
            $this->agenda->create($data);
            $request->getemail == true ? $this->enviaremail($request->cliente_id, $this->agenda->setIdAgendamento()) : '';
            flash('<i class="fa fa-check"></i> Agenda salva com sucesso!')->success();
            return redirect()->route('agendas.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir agenda!';
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        $users = $this->user->where('funcao', 3)->get();
        return view('agendas.edit', compact('agenda', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return redirect()->route('agendas.show', ['agenda' => $agenda->id_agenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->all();
        $rules = [
            'cliente_id' => 'required',
            'tecnico_id' => 'required',
            'data' => 'required',
            'hora' => 'required',
            'servico' => 'required',
            'detalhes' => 'required',
            'status' => 'required',
            'observacoes' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $data['data'] = Carbon::createFromFormat("d/m/Y", $request->data)->format("Y-m-d");
            $agenda->update($data);
            $request->getemail == true ? $this->enviaremail($request->cliente_id, $agenda->setIdAgendamento()) : '';
            flash('<i class="fa fa-check"></i> Agenda salva com sucesso!')->success();
            return redirect()->route('agendas.show', ['agenda' => $agenda->id_agenda]);
        } catch (\Exception $e) {
            $message = 'Erro ao inserir agenda!';
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        flash('<i class="fa fa-check"></i> Agenda removido com sucesso!')->success();
        return redirect()->route('agendas.index');
    }
}
