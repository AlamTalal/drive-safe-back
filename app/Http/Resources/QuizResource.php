<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource {

    public static $wrap = 'quiz';

    public function toArray($request) {

        // id, order, level, enabled, created_at, updated_at, deleted_at, Locals, Files
        // rand, duration, group, Bonds

        return [
            'type'      => 'quiz', 
            'id'        => $this->id(), 
            'order'     => $this->order(), 
            'level'     => $this->level(), 
            'enabled'   => $this->enabled(), 
            'group'     => $this->group, 
            'qscount'   => $this->enabledQBonds()->count(), 
            'locals'    => LocalResource::collection($this->getLocals()->getResults()), 
            'files'     => FileResource::collection($this->getFiles()->getResults()), 
            'link'      => route('groups.index'), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }
}
