<?php

namespace Modules\BaseCore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\BaseCore\Models\Phone;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->unique()->phoneNumber,
        ];
    }
}
