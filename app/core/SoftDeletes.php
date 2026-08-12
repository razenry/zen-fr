<?php

namespace App\Core;

trait SoftDeletes
{
    public function isSoftDeleteEnabled(): bool
    {
        return true;
    }

    public function getDeletedAtColumn(): string
    {
        return property_exists($this, 'deletedAtColumn') ? $this->deletedAtColumn : 'deleted_at';
    }

    public function trashed(): bool
    {
        $column = $this->getDeletedAtColumn();
        return !is_null($this->{$column} ?? null);
    }

    public function restore(): bool
    {
        $column = $this->getDeletedAtColumn();
        $this->{$column} = null;

        if (isset($this->attributes['id']) && $this->attributes['id']) {
            try {
                return (bool) $this->getDbInstance()->where('id', $this->attributes['id'])->update([$column => null]);
            } catch (\Exception $e) {
                return true;
            }
        }
        return true;
    }

    public function forceDelete(): bool
    {
        if (isset($this->attributes['id']) && $this->attributes['id']) {
            try {
                return (bool) $this->getDbInstance()->where('id', $this->attributes['id'])->delete();
            } catch (\Exception $e) {
                return true;
            }
        }
        return true;
    }
}
