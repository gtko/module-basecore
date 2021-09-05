<?php

namespace Modules\BaseCore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\BaseCore\Models\Personne;

class PersonneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'date_birth' => $this->faker->dateTime,
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'address_id' => \Modules\BaseCore\Models\Address::factory(),
        ];
    }
}
