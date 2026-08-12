<?php

namespace App\Core\Relations;

use App\Core\Model;

class HasOne extends Relation
{
    protected function addConstraints(): void
    {
        $parentKeyValue = $this->parent->{$this->localKey} ?? null;
        $this->queryInstance->where($this->foreignKey, '=', $parentKeyValue);
    }

    public function getResults(): ?Model
    {
        return $this->queryInstance->first();
    }
}
