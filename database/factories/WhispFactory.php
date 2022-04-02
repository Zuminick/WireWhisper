<?php

namespace Database\Factories;

use App\Models\Whisp;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WhispFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Whisp::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'body' => $this->faker->sentence()
        ];
    }
}
