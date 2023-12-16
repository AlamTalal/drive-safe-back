<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FileCollection extends ResourceCollection {

     public static $wrap = 'files';
    
    public function toArray($request) {
        return [
            'files' => $this->collection, 
            'link'  => route('files.index'), 
        ];

        //public $collects = Member::class;
        //public $preserveKeys = true;
        //$array = [];
        //for ($i = 0; $i < sizeof($this); $i++) {
        //    $j = $this[$i]->dialogue_id;
        //    $array[$j] = $this[$i];
        //}
        //return $array;
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}