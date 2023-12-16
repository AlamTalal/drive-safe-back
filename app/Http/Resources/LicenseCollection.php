<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LicenseCollection extends ResourceCollection {

    public static $wrap = 'licenses';
    
    public function toArray($request) {
        return [
            'licenses'  => $this->collection, 
            'link'      => route('licenses.index'), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
