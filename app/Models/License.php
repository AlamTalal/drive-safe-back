<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Group;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class License extends Model {
    use ModelHelper, HasFactory;

    // id, order, enabled, created_at, updated_at, deleted_at, Locals, Files
    // Groups, Quizzes

    protected $table = 'license';
    protected $fillable = ['order', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    private function type(): string {
        return 'ls';
    }

    public function enabledGroups(): HasMany { 
        return $this->groups()->where('enabled', '1');
    }

    public function groups(): HasMany {
        return $this->allGroups()->whereNull('deleted_at');
    }
    
    public function allGroups(): HasMany {
        return $this->hasMany(Group::class, 'license');
    }

    public function quizzes(): HasManyThrough {
        return $this->hasManyThrough(Quiz::class, Group::class, 'license', 'group')
                    ->where('group.enabled', '1')->whereNull('group.deleted_at')
                    ->where('quiz.enabled' , '1')->whereNull('quiz.deleted_at');
    }
}
