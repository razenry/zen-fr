<?php

namespace App\Core;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use ArrayIterator;
use JsonSerializable;
use Traversable;

class Collection implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    protected array $items = [];

    public function __construct($items = [])
    {
        $this->items = $this->getArrayableItems($items);
    }

    public static function make($items = []): static
    {
        return new static($items);
    }

    protected function getArrayableItems($items): array
    {
        if (is_array($items)) {
            return $items;
        } elseif ($items instanceof self) {
            return $items->all();
        } elseif ($items instanceof JsonSerializable) {
            return (array) $items->jsonSerialize();
        } elseif ($items instanceof Traversable) {
            return iterator_to_array($items);
        }

        return (array) $items;
    }

    public function all(): array
    {
        return $this->items;
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        }
        return $default;
    }

    public function first(?callable $callback = null, $default = null)
    {
        if ($callback === null) {
            return empty($this->items) ? $default : reset($this->items);
        }

        foreach ($this->items as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return $default;
    }

    public function last(?callable $callback = null, $default = null)
    {
        if ($callback === null) {
            return empty($this->items) ? $default : end($this->items);
        }

        return (new static(array_reverse($this->items, true)))->first($callback, $default);
    }

    public function map(callable $callback): static
    {
        $keys = array_keys($this->items);
        $items = array_map($callback, $this->items, $keys);
        return new static(array_combine($keys, $items));
    }

    public function filter(?callable $callback = null): static
    {
        if ($callback) {
            return new static(array_filter($this->items, $callback, ARRAY_FILTER_USE_BOTH));
        }
        return new static(array_filter($this->items));
    }

    public function pluck($value, $key = null): static
    {
        $results = [];

        foreach ($this->items as $item) {
            $itemValue = is_object($item) ? ($item->{$value} ?? null) : ($item[$value] ?? null);

            if (is_null($key)) {
                $results[] = $itemValue;
            } else {
                $itemKey = is_object($item) ? ($item->{$key} ?? null) : ($item[$key] ?? null);
                $results[$itemKey] = $itemValue;
            }
        }

        return new static($results);
    }

    public function where($key, $operator = null, $value = null): static
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }

        return $this->filter(function ($item) use ($key, $operator, $value) {
            $retrieved = is_object($item) ? ($item->{$key} ?? null) : ($item[$key] ?? null);

            switch ($operator) {
                case '=':
                case '==':
                    return $retrieved == $value;
                case '===':
                    return $retrieved === $value;
                case '!=':
                case '<>':
                    return $retrieved != $value;
                case '!==':
                    return $retrieved !== $value;
                case '<':
                    return $retrieved < $value;
                case '>':
                    return $retrieved > $value;
                case '<=':
                    return $retrieved <= $value;
                case '>=':
                    return $retrieved >= $value;
                default:
                    return $retrieved == $value;
            }
        });
    }

    public function whereIn($key, array $values): static
    {
        return $this->filter(function ($item) use ($key, $values) {
            $retrieved = is_object($item) ? ($item->{$key} ?? null) : ($item[$key] ?? null);
            return in_array($retrieved, $values, true) || in_array($retrieved, $values);
        });
    }

    public function onlyTrashed(): static
    {
        return $this->filter(function ($item) {
            if (is_object($item) && method_exists($item, 'trashed')) {
                return $item->trashed();
            }
            $deletedAt = is_object($item) ? ($item->deleted_at ?? null) : ($item['deleted_at'] ?? null);
            return !is_null($deletedAt);
        });
    }

    public function withTrashed(): static
    {
        return new static($this->items);
    }

    public function withoutTrashed(): static
    {
        return $this->filter(function ($item) {
            if (is_object($item) && method_exists($item, 'trashed')) {
                return !$item->trashed();
            }
            $deletedAt = is_object($item) ? ($item->deleted_at ?? null) : ($item['deleted_at'] ?? null);
            return is_null($deletedAt);
        });
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function isNotEmpty(): bool
    {
        return !$this->isEmpty();
    }

    public function toArray(): array
    {
        return array_map(function ($value) {
            if ($value instanceof self) {
                return $value->toArray();
            }
            if (is_object($value) && method_exists($value, 'toArray')) {
                return $value->toArray();
            }
            return $value;
        }, $this->items);
    }

    public function toJson($options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }
}
