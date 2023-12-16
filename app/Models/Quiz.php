<?php

namespace App\Models;

use App\Models\QBond;
use App\Models\Group;
use App\Traits\HasFiles;
use App\Traits\HasLocals;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model {
    use ModelHelper, HasFactory, HasLocals, HasFiles;

    // id, order, level, enabled, created_at, updated_at, deleted_at, Locals, Files
    // rand, duration, group, Bonds

    protected $table = 'quiz';
    protected $fillable = ['group', 'order', 'rand', 'level', 'duration', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    private function type(): string {
        return 'qz';
    }

    public function random(int $newRandom = null): bool {
        $this->rand = ($newRandom ?? $this->rand);
        return $this->rand;
    }

    public function duration(int $newDuration = null): int {
        $this->duration = ($newDuration ?? $this->duration);
        return $this->duration;
    }

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class, 'group');
    }

    public function enabledQBonds(): HasMany {
        return $this->QBonds()->where('enabled', '1');
    }

    public function QBonds(): HasMany {
        return $this->allQBonds()->whereNull('deleted_at');
    }

    public function allQBonds(): HasMany {
        return $this->hasMany(QBond::class, 'quiz');
    }
}
