<?php

namespace App\Core\Relations;

use App\Core\Model;
use App\Core\Collection;
use ArrayAccess;
use Countable;
use IteratorAggregate;
use Traversable;
use ArrayIterator;

abstract class Relation implements ArrayAccess, Countable, IteratorAggregate
{
    protected Model $parent;
    protected string $relatedModel;
    protected string $foreignKey;
    protected string $localKey;
    protected Model $queryInstance;

    public function __construct(Model $parent, string $relatedModel, string $foreignKey, string $localKey)
    {
        $this->parent = $parent;
        $this->relatedModel = $relatedModel;
        $this->foreignKey = $foreignKey;
        $this->localKey = $localKey;
        
        $this->queryInstance = new $relatedModel();
        $this->addConstraints();
    }

    abstract protected function addConstraints(): void;
    abstract public function getResults();

    public function getParent(): Model
    {
        return $this->parent;
    }

    public function getRelatedModel(): string
    {
        return $this->relatedModel;
    }

    public function getForeignKey(): string
    {
        return $this->foreignKey;
    }

    public function getLocalKey(): string
    {
        return $this->localKey;
    }

    public function getQueryInstance(): Model
    {
        return $this->queryInstance;
    }

    public function where($column, $operator = null, $value = null): static
    {
        $this->queryInstance->where($column, $operator, $value);
        return $this;
    }

    public function whereIn($column, array $values): static
    {
        $this->queryInstance->whereIn($column, $values);
        return $this;
    }

    public function orderBy($column, $direction = 'ASC'): static
    {
        $this->queryInstance->orderBy($column, $direction);
        return $this;
    }

    public function limit($limit, $offset = 0): static
    {
        $this->queryInstance->limit($limit, $offset);
        return $this;
    }

    public function withTrashed(): static
    {
        if (method_exists($this->queryInstance, 'withTrashed')) {
            $this->queryInstance->withTrashed();
        }
        return $this;
    }

    public function onlyTrashed(): static
    {
        if (method_exists($this->queryInstance, 'onlyTrashed')) {
            $this->queryInstance->onlyTrashed();
        }
        return $this;
    }

    public function withoutTrashed(): static
    {
        if (method_exists($this->queryInstance, 'withoutTrashed')) {
            $this->queryInstance->withoutTrashed();
        }
        return $this;
    }

    public function get(): mixed
    {
        return $this->getResults();
    }

    public function first(): ?Model
    {
        return $this->queryInstance->first();
    }

    public function count(): int
    {
        return $this->queryInstance->count();
    }

    public function getIterator(): Traversable
    {
        $results = $this->getResults();
        return $results instanceof Collection ? $results->getIterator() : new ArrayIterator((array)$results);
    }

    public function offsetExists(mixed $offset): bool
    {
        $results = $this->getResults();
        return isset($results[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset): mixed
    {
        $results = $this->getResults();
        return $results[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $results = $this->getResults();
        $results[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        $results = $this->getResults();
        unset($results[$offset]);
    }
}
