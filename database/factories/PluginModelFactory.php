<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PluginModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
