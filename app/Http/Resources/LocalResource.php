<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalResource extends JsonResource {
    
    public static $wrap = 'local';

    public function toArray($request) {

        // id, enabled, created_at, updated_at, deleted_at
        // code, object_id, object_type, key, text, audio

        return [
            'type'      => 'local', 
            'id'        => $this->id(), 
            'key'       => $this->key(), 
            'text'      => $this->text(), 
            'audio'     => $this->audio(), 
            'enabled'   => $this->enabled(), 
            'lang'      => [
                'id'    => $this->language()->id(), 
                'code'  => $this->code(), 
            ], 
            'object'    => [
                'type'  => $this->fullObjectType(), 
                'id'    => $this->objectID(), 
            ], 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
