<?php

namespace App\Models;

use App\Models\Language;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Local extends Model {
    use ModelHelper, HasFactory;

    // id, enabled, created_at, updated_at, deleted_at
    // code, object_id, object_type, key, text, audio, Language

    protected $table = 'local';
    protected $fillable = ['code', 'object_id', 'object_type', 'key', 'text', 'audio', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    public function code(string $newCode = null): string {
        $this->code = ($newCode ?? $this->code);
        return (string) $this->code;
    }

    public function objectID(string $newObject = null): string {
        $this->object_id = ($newObject ?? $this->object_id);
        return (string) $this->object_id;
    }

    public function shortObjectType(string $newObjectType = null): string {
        $this->object_type = ($newObjectType ?? $this->object_type);
        return $this->object_type;
    }

    public function fullObjectType(): string {
        switch ($this->object_type) {
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

    public function key(string $newKey = null): string {
        $this->key = ($newKey ?? $this->key);
        return (string) $this->key;
    }

    public function text(string $newText = null): string {
        $this->text = ($newText ?? $this->text);
        return (string) $this->text;
    }

    public function audio(string $newAudio = null): string {
        $this->audio = ($newAudio ?? $this->audio);
        return (string) $this->audio;
    }

    public function language(): Language {
        return Language::where('code', $this->code)->where('enabled', 1)->whereNull('deleted_at')->first();
    }
}
