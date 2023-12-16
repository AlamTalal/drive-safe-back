<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource {

    public static $wrap = 'group';

    public function toArray($request) {

        // id, order, level, enabled, created_at, updated_at, deleted_at, Locals, Files
        // license, Quizzes

        return [
            'type'      => 'group', 
            'id'        => $this->id(), 
            'order'     => $this->order(), 
            'level'     => $this->level(), 
            'enabled'   => $this->enabled(), 
            'license'   => $this->license, 
            'qzcount'   => $this->enabledQuizzes()->count(), 
            'locals'    => LocalResource::collection($this->getLocals()->getResults()), 
            'files'     => FileResource::collection($this->getFiles()->getResults()), 
            'link'      => route('groups.show', $this->id()), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
