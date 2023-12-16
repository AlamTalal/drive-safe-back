<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        return [
            'group' => 0, 
            'level' => 0, 
            'order' => 0, 
        ];
    }
}
