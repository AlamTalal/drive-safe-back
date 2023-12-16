<?php

namespace App\Models;

use App\Models\Hint;
use App\Models\QBond;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model {
    use ModelHelper, HasFactory;

    // id, level, enabled, created_at, updated_at, deleted_at, Locals
    // hint, QBonds
    
    protected $table = 'question';
    protected $fillable = ['hint', 'level', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    private function type(): string {
        return 'qs';
    }

    public function hint(): BelongsTo {
        return $this->belongsTo(Hint::class, 'hint')->where('enabled', 1)->whereNull('deleted_at');
    }

    public function enabledQBonds(): HasMany {
        return $this->CBonds()->where('enabled', '1');
    }

    public function QBonds(): HasMany {
        return $this->allQBonds()->whereNull('deleted_at');
    }

    public function allQBonds(): HasMany {
        return $this->hasMany(QBond::class, 'question');
    }
}
