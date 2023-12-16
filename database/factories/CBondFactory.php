<?php

namespace Database\Factories;

use App\Models\CBond;
use Illuminate\Database\Eloquent\Factories\Factory;

class CBondFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    //protected $model = CBond::class;
    // id, question, choice, order, correct, enabled, created_at, updated_at, deleted_at

    public function definition() {
         
        return [
            'question' => 0,
            'choice'   => 0,
            'order'    => 'N/A',
            'correct'  => 0, 
        ];
    }
}
