<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\License;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model {
    use ModelHelper, HasFactory;

    // id, order, level, enabled, created_at, updated_at, deleted_at, Locals, Files
    // license, Quizzes
    
    protected $table = 'group';
    protected $fillable = ['license', 'order', 'level', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    private function type(): string {
        return 'gp';
    }

    public function license(): BelongsTo {
        return $this->belongsTo(License::class, 'license');
    }

    public function enabledQuizzes(): HasMany { 
        return $this->quizzes()->where('enabled', '1');
    }

    public function quizzes(): HasMany {
        return $this->allQuizzes()->whereNull('deleted_at');
    }
    
    public function allQuizzes(): HasMany {
        return $this->hasMany(Quiz::class, 'group');
    }
}
