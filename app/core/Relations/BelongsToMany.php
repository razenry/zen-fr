<?php

namespace App\Core\Relations;

use App\Core\Model;
use App\Core\Collection;

class BelongsToMany extends Relation
{
    protected string $pivotTable;
    protected string $foreignPivotKey;
    protected string $relatedPivotKey;
    protected array $pivotColumns = [];

    public function __construct(
        Model $parent,
        string $relatedModel,
        ?string $table = null,
        ?string $foreignPivotKey = null,
        ?string $relatedPivotKey = null
    ) {
        $relatedInstance = new $relatedModel();
        
        if ($table === null) {
            $tables = [$parent->getTable(), $relatedInstance->getTable()];
            sort($tables);
            $table = implode('_', $tables);
        }

        $this->pivotTable = $table;
        $this->foreignPivotKey = $foreignPivotKey ?? ($parent->getTable() . '_id');
        $this->relatedPivotKey = $relatedPivotKey ?? ($relatedInstance->getTable() . '_id');

        parent::__construct($parent, $relatedModel, $this->foreignPivotKey, $parent->getPrimaryKey());
    }

    protected function addConstraints(): void
    {
        $parentKey = $this->parent->{$this->localKey} ?? null;
        if ($parentKey !== null) {
            $relatedInstance = new $this->relatedModel();
            $relatedTable = $relatedInstance->getTable();
            $relatedKey = $relatedInstance->getPrimaryKey();

            $this->queryInstance
                ->select("{$relatedTable}.*")
                ->join($this->pivotTable, "{$this->pivotTable}.{$this->relatedPivotKey}", '=', "{$relatedTable}.{$relatedKey}")
                ->where("{$this->pivotTable}.{$this->foreignPivotKey}", '=', $parentKey);
        }
    }

    public function withPivot(array $columns): static
    {
        $this->pivotColumns = array_unique(array_merge($this->pivotColumns, $columns));
        return $this;
    }

    public function getResults(): Collection
    {
        return $this->queryInstance->get();
    }

    public function getPivotTable(): string
    {
        return $this->pivotTable;
    }

    public function getForeignPivotKey(): string
    {
        return $this->foreignPivotKey;
    }

    public function getRelatedPivotKey(): string
    {
        return $this->relatedPivotKey;
    }
}
