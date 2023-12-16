<?php

namespace App\Traits;

use DateTime;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// id, order, level, enabled, created_at, updated_at, deleted_at, Locals, Files

trait ModelHelper {
    use HasLocals, HasFiles;
    
    public function id(): string {
        return (string) $this->id;
    }

    public function order(int $newOrder = null): int {
        $this->order = ($newOrder ?? $this->order);
        return $this->order;
    }

    public function level(int $newLevel = null): int {
        $this->level = ($newLevel ?? $this->level);
        return $this->level;
    }

    public function enabled(bool $newEnabled = null): bool {
        $this->enabled = ($newEnabled ?? $this->enabled);
        return $this->enabled;
    }

    public function createdAt(): DateTime {
        return $this->created_at;
    }

    public function updatedAt(): DateTime {
        return $this->updated_at;
    }

    public function deletedAt(): DateTime {
        return $this->deleted_at;
    }

    public function getLocals(): HasMany {
        return $this->enabledLocals($this);
    }

    public function getFiles(): BelongsToMany {
        return $this->enabledFiles($this);
    }
}