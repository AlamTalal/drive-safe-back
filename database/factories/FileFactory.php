<?php

namespace Database\Factories;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        return [
            'name'          => $this->faker->name(),
            'extension'     => $this->faker->randomElement(['jpg', 'png', 'pdf', 'txt', 'mp4']),
            'kind'          => $this->faker->randomElement(['immage', 'pdf', 'text', 'video']),
            'url'           => $this->faker->imageUrl(), 
            'original_path' => 'downloads//immages',
        ];
    }
}
