<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\CBond;
use App\Models\Question;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QBond extends Model {
    use ModelHelper, HasFactory;

    // id, order, enabled, created_at, updated_at, deleted_at, Files
    // quiz, question, kind, CBonds

    protected $table = 'quiz_question';
    protected $fillable = ['quiz', 'question', 'kind', 'order', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];

    private function type(): string {
        return 'qs';
    }

    public function kind(string $newKind = null): string {
        $this->kind = ($newKind ?? $this->kind);
        return $this->kind;
    }

    public function quiz(): BelongsTo {
        return $this->belongsTo(Quiz::class, 'quiz');
    }

    public function question(): BelongsTo {
        return $this->belongsTo(Question::class, 'question');
    }

    public function enabledCBonds(): HasMany {
        return $this->CBonds()->where('enabled', '1');
    }

    public function CBonds(): HasMany {
        return $this->allCBonds()->whereNull('deleted_at');
    }

    public function allCBonds(): HasMany {
        return $this->hasMany(CBond::class, 'question');
    }
}
