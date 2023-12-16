<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource {
    
    public static $wrap = 'file';

    public function toArray($request) {

        // id, enabled, created_at, updated_at, deleted_at
        // name, extension, kind, url, original_path

        return [
            'type'      => 'file', 
            'id'        => $this->id(), 
            'name'      => $this->name(), 
            'extension' => $this->extension(), 
            'kind'      => $this->kind(), 
            'url'       => $this->url(), 
            'original'  => $this->originalPath(), 
            'enabled'   => $this->enabled(), 
            'object'    => $this->when(($this->belong), function () {
                return [
                    'type'  => $this->getType($this->belong->object_type), 
                    'id'    => $this->belong->object_id
                ];
            }), 
            'objects'    => $this->when((!($this->belong)), function () {
                $objects = $this->objects();
                foreach($objects as $object) {
                    $object->type = $this->getType($object->type);
                } return $objects;
            }), 
        ];
    }

    public function with($request) {
        return ['status' => 'success'];
    }

    public function withResponse($request, $response) {
        $response->header('Accept', 'application/json');
    }

    private function getType(string $type): string {
        switch ($type) {
            case 'ap':  return 'app';
            case 'ls':  return 'license';
            case 'gp':  return 'group';
            case 'qz':  return 'quiz';
            case 'qs':  return 'question';
            case 'ht':  return 'hint';
            case 'ch':  return 'choice';
            default:    return 'other';
        }
    }
}
