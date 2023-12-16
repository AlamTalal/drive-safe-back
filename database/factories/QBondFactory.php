<?php

namespace Database\Factories;

use App\Models\QBond;
use Illuminate\Database\Eloquent\Factories\Factory;

class QBondFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */

    //protected $model = QBond::class;
    // id, quiz, question, kind, order, enabled, created_at, updated_at, deleted_at

    public function definition() {
        
        return [
            'quiz'      => 0,
            'question'  => 0,
            'kind'      => 'N/A',
            'order'     => 0, 
        ];
    }
}
