<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LicenseResource extends JsonResource {

    public static $wrap = 'license';

    public function toArray($request) {
        
        // id, order, enabled, created_at, updated_at, deleted_at, Locals, Files
        // Groups, Quizzes

        return [
            'type'      => 'license', 
            'id'        => $this->id(), 
            'order'     => $this->order(), 
            'enabled'   => $this->enabled(), 
            'gpcount'   => $this->enabledGroups()->count(), 
            'qzcount'   => $this->quizzes()->count(), 
            'locals'    => LocalResource::collection($this->getLocals()->getResults()), 
            'files'     => FileResource::collection($this->getFiles()->getResults()), 
            'link'      => route('licenses.show', $this->id()), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
