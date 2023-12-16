<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Choice extends Model {
    use ModelHelper, HasFactory;

    // id, enabled, created_at, updated_at, deleted_at, Locals

    protected $table = 'choice';
    protected $fillable = ['enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    private function type(): string {
        return 'ch';
    }
}
