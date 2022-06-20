<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'header' => $this->faker->title,
            'desc' => $this->faker->text,
            'ip' => $this->faker->ipv4,
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
