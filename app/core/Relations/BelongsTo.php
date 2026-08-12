<?php

namespace App\Core\Relations;

use App\Core\Model;

class BelongsTo extends Relation
{
    protected function addConstraints(): void
    {
        $foreignKeyValue = $this->parent->{$this->foreignKey} ?? null;
        $this->queryInstance->where($this->localKey, '=', $foreignKeyValue);
    }

    public function getResults(): ?Model
    {
        return $this->queryInstance->first();
    }
}
