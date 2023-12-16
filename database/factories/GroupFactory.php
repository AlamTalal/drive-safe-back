<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        
        return [
            'license'   => 0, 
            'level'     => 0, 
            'order'     => 0, 
        ];
    }
}
