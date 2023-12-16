<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


trait HasFiles {

    public function enabledFiles(self $model): BelongsToMany {
        return $this->files($model)->wherePivot('enabled', '1')->where('file.enabled', '1');
    }

    public function files(self $model): BelongsToMany {
        return $this->allFiles($model)->whereNull('file.deleted_at');
    }

    public function allFiles(self $model): BelongsToMany {
        return $model->belongsToMany(File::class, 'object_file', 'object_id', 'file')
                        ->withPivot('object_id', 'object_type', 'enabled', 'deleted_at')
                        ->wherePivot('object_type', $model->type())
                        ->wherePivotNull('deleted_at')
                        ->withTimestamps()->as('belong');
    }
}