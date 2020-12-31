<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => $this->faker->randomElement(Cliente::pluck('id_cliente', 'id_cliente')->toArray()),
            'data' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'servico' => 'defeito fonte',
            'detalhes' => 'Fonte aquecendo',
            'tecnico' => '1',
            'status' => '0'
        ];
    }
}
