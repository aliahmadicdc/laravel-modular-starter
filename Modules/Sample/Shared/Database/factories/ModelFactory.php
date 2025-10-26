<?php

namespace Modules\Sample\Shared\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'value' => fake()->name()
        ];
    }
}
