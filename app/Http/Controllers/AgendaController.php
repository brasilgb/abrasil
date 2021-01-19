<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class AgendaController extends Controller
{
    /**
     * @var Agenda
     * @var User
     * @var Email
     * @var Cliente
     */
    public function __construct(Agenda $agenda, User $user, Email $email, Cliente $cliente)
    {
        $this->agenda = $agenda;
        $this->user = $user;
        $this->email = $email;
        $this->cliente = $cliente;
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
            $this->agenda->create($data);
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
            flash('<i class="fa fa-check"></i> Agenda salvo com sucesso!')->success();
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

    public function enviaemail($idcliente)
    {
        $usermail = $this->email->all()->first();
        $clientes = $this->cliente->where('id_cliente', $idcliente)->get();
        foreach($clientes as $cliente):
            $remetente = $cliente->cliente;
            $destino = $cliente->email;
        endforeach;
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
        $mail->Host = $usermail['smtp']; //Podemos usar o servidor do gMail para enviar.
        $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
        $mail->Username = $usermail['usuario']; //Usuário do gMail
        $mail->Password = $usermail['senha']; //Senha do gMail
        $mail->SMTPSecure = $usermail['seguranca']; //Estabelecemos qual protocolo de segurança será usado.
        $mail->Port = $usermail['porta']; //Estabelecemos a porta utilizada pelo servidor do gMail.
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
        $mail->SetFrom('' . $usermail['usuario'] . '', '' . $remetente . ''); //Quem está enviando o e-mail.
        $mail->AddReplyTo('' . $usermail['usuario'] . '', '' . $remetente . ''); //Para que a resposta será enviada.
        $mail->Subject = 'assunto'; //Assunto do e-mail.
        $mail->Body = '$mensagem' . "<br/>";
        $mail->AltBody = "Para visualizar esse e-mail corretamente, use um visualizador de e-mail com suporte a HTML!";

            $mail->AddAddress(ltrim($destino), "");

        //$mail->addAttachment($path);
        if (!$mail->Send()) {
            flash('<i class="fa fa-check"></i> ocorreu um erro durante o envio!' . $mail->ErrorInfo)->success();
            return redirect()->route('home');
        } else {
            flash('<i class="fa fa-check"></i> Relatório enviado com sucesso!')->success();
            return redirect()->route('home');
        }
    }
}
