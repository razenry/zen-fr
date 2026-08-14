<?php

namespace App\Core;

trait HasAuthorization
{
    /**
     * Determine if entity has permission to perform ability.
     */
    public function can(string $ability, mixed $params = null): bool
    {
        return Gate::allows($ability, $this, $params);
    }

    /**
     * Determine if entity is denied permission to perform ability.
     */
    public function cannot(string $ability, mixed $params = null): bool
    {
        return Gate::denies($ability, $this, $params);
    }
}
