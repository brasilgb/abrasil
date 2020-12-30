<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'mobile_phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'house_number' => $this->faker->numerify(),
            'complement' => 'casa',
            'neighborhood' => 'centro',
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'zip_code' => $this->faker->postcode,
            'cpf' => '256485214',
            'rg' => '263548951',
            'contact' => $this->faker->name,
            'contact_phone' => $this->faker->phoneNumber,
            'contact_mobile' => $this->faker->phoneNumber
        ];
    }
}