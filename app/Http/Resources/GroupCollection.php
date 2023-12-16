<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupCollection extends ResourceCollection {

    public static $wrap = 'groups';
    
    public function toArray($request) {
        return [
            'groups' => $this->collection, 
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
