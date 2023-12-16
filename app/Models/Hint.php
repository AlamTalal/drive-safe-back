<?php

namespace App\Models;

use App\Models\Question;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hint extends Model {
    use ModelHelper, HasFactory;
    
    // id, enabled, created_at, updated_at, deleted_at, Locals, Files
    // Question
    
    protected $table = 'hint';
    protected $fillable = ['enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];
    
    private function type(): string {
        return 'ht';
    }

    public function qustion(): HasOne {
        return $this->hasOne(Question::class, 'hint')->where('enabled', 1)->whereNull('deleted_at');
    }
}
