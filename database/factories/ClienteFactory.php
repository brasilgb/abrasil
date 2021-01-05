<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => $this->faker->tollFreePhoneNumber,
            'celular' => $this->faker->tollFreePhoneNumber,
            'logradouro' => $this->faker->address,
            'numero' => $this->faker->buildingNumber,
            'complemento' => 'casa',
            'bairro' => 'Bairro',
            'estado' => $this->faker->state,
            'cidade' => $this->faker->city,
            'cep' => $this->faker->postcode,
            'cpf' => '86868686868',
            'rg' => '994949494949',
            'contato' => $this->faker->name,
            'telefone_contato' => $this->faker->tollFreePhoneNumber,
            'celular_contato' => $this->faker->tollFreePhoneNumber
        ];
    }
}
