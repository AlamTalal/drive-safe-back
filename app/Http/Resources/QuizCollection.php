<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizCollection extends ResourceCollection {

    public static $wrap = 'quizzes';
    
    public function toArray($request) {
        return [
            'quizzes' => $this->collection, 
            'link'   => route('groups.index'), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
