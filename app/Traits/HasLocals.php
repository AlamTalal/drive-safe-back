<?php

namespace App\Traits;

use App\Models\Local;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasLocals {

    public function objectLocals(self $model): Collection {

        $locals = new Collection();
        $elequents = $this->enabledLocals($model);

        $elequents->each(function ($elequent) use ($locals) {
            if(!($locals->has($elequent->code()))) {
                $locals->put($elequent->code(), (new Collection())->put($elequent->key(), collect(['id' => $elequent->id(), 'text' => $elequent->text(), 'audio' => $elequent->audio()])));
            } elseif(!($locals->get($elequent->code())->has($elequent->key()))) {
                $locals->get($elequent->code())->put($elequent->key(), collect(['id' => $elequent->id(), 'text' => $elequent->text(), 'audio' => $elequent->audio()]));
            } else {
                $locals->get($elequent->code())->get($elequent->key())->collect(['id' => $elequent->id(), 'text' => $elequent->text(), 'audio' => $elequent->audio()]);
            }
        });
        
        return $locals;
    }

    public function enabledLocals(self $model, string $code = 'N/A'): HasMany {
        return $this->locals($model, $code)->where('enabled', '1');
    }

    public function locals(self $model, string $code = 'N/A'): HasMany {
        return $this->LocalsWithDeleted($model, $code)->whereNull('deleted_at');
    }

    public function LocalsWithDeleted(self $model, string $code = 'N/A'): HasMany {
        return (
            ($code === 'N/A')?
                $model->hasMany(Local::class, 'object_id')->where('object_type', $model->type()) : 
                $model->hasMany(Local::class, 'object_id')->where('object_type', $model->type())->where('code', $code)
        );
    }
}