<?php

namespace App\Core\Relations;

use App\Core\Collection;

class HasMany extends Relation
{
    protected function addConstraints(): void
    {
        $parentKeyValue = $this->parent->{$this->localKey} ?? null;
        $this->queryInstance->where($this->foreignKey, '=', $parentKeyValue);
    }

    public function getResults(): Collection
    {
        return $this->queryInstance->get();
    }
}
