<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Ordem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ordem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => $this->faker->randomElement(Cliente::pluck('id_cliente', 'id_cliente')->toArray()),
            'defeito' => 'todos',
            'equipamento' => 'qualquer',
            'modelo' => 'melhorzinho',
            'senha' => '203040',
            'estado' => 'bom',
            'acessorios' => 'todos',
            'orcamento' => '0',
            'descorcamento' => 'Troca de pilha',
            'detalhes' => 'dfsdf',
            'valpecas' => '00',
            'valservico' => '00',
            'custo' => '00',
            'previsao' => '2020-12-15',
            'statusorcamento' => '1',
            'status' => '1',
            'comunicado' => '1',
            'entrega' => '1',
            'dt_entrega' => '2020-12-20',
            'hr_entrega' => '20:00',
            'tecnico' => 'Anderson',
            'observacoes' => 'tudo pronto',
        ];
    }
}
