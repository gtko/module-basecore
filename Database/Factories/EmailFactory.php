<?php

namespace Modules\BaseCore\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\BaseCore\Models\Email;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->word.$this->faker->randomNumber(5)."@".$this->faker->domainWord.'.'.$this->faker->tld,
        ];
    }
}
