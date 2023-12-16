<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model {
    use ModelHelper, HasFactory;

    // id, enabled, created_at, updated_at, deleted_at
    // name, extension, kind, url, original_path, Objects

    protected $table = 'file';
    protected $fillable = ['name', 'extension', 'kind', 'url', 'original_path', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    public function name(string $newName = null): string {
        $this->name = ($newName ?? $this->name);
        return (string) $this->name;
    }

    public function extension(string $newExtension = null): string {
        $this->extension = ($newExtension ?? $this->extension);
        return (string) $this->extension;
    }

    public function kind(string $newKind = null): string {
        $this->kind = ($newKind ?? $this->kind);
        return (string) $this->kind;
    }

    public function url(string $newURL = null): string {
        $this->url = ($newURL ?? $this->url);
        return (string) $this->url;
    }

    public function originalPath(string $newOriginalPath = null): string {
        $this->original_path = ($newOriginalPath ?? $this->original_path);
        return (string) $this->original_path;
    }

    public function objects() {
        return DB::table('object_file')->select('object_type as type',  'object_id as id')
            ->where('file', $this->id)->where('enabled', 1)->whereNull('deleted_at')
            ->get()->toArray();
    }
}
