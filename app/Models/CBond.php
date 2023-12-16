<?php

namespace App\Models;

use App\Models\QBond;
use App\Models\Choice;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CBond extends Model {
    use ModelHelper, HasFactory;

    // id, order, enabled, created_at, updated_at, deleted_at, Files
    // question, choice, correct

    protected $table = 'single_choice_question';
    protected $fillable = ['question', 'choice', 'order', 'correct', 'enabled', 'deleted_at'];
    protected $casts = ['correct' => 'boolean', 'enabled' => 'boolean'];

    private function type(): string {
        return 'ch';
    }

    public function correct(bool $newCorrect = null): bool {
        $this->correct = ($newCorrect ?? $this->correct);
        return $this->correct;
    }
    
    public function question(): BelongsTo {
        return $this->belongsTo(QBond::class, 'question');
    }

    public function choice(): BelongsTo {
        return $this->belongsTo(Choice::class, 'choice');
    }
}
