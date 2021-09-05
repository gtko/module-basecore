<?php

namespace Modules\BaseCore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\BaseCore\Database\Seeders\CountriesDatas;
use Modules\BaseCore\Models\Country;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return $this->faker->randomElements((new CountriesDatas())->data());
    }
}
