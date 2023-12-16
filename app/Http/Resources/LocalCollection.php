<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LocalCollection extends ResourceCollection {

    public static $wrap = 'locals';

    public function toArray($request) {
        return [
            'locals' => $this->collection, 
            'link'   => route(''), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
