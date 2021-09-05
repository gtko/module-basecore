<?php

namespace Modules\BaseCore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\BaseCore\Models\Address;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'code_zip' => $this->faker->postcode,
            'country_id' => 150,
        ];
    }
}
