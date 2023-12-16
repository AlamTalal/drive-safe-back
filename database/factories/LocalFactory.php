<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
    
        return [
            'code'        => 'NA',
            'object_id'   => 0,
            'object_type' => 'NA',
            'key'         => 'NA', 
            'text'        => $this->faker->paragraph(),
            'audio'       => $this->faker->url(), 
        ];
    }

    public function shortText($words) {
        return $this->faker->sentence($words);
    }
}
