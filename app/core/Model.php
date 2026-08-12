<?php

namespace App\Core;

use Database\Database;
use App\Core\Relations\Relation;
use App\Core\Relations\HasOne;
use App\Core\Relations\HasMany;
use App\Core\Relations\BelongsTo;

class Model
{
    protected $table;
    protected $db;
    protected $attributes = [];
    protected $casts = [];
    protected $relations = [];
    protected $withRelations = [];
    protected $softDeleteScope = null; // 'with', 'only', 'without', or null

    public function __construct()
    {
        $this->db = new Database();
        $this->table = $this->table ?: strtolower(basename(str_replace('\\', '/', static::class))) . 's';
        $this->db->table($this->table);
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static())->$method(...$parameters);
    }

    public function getDbInstance(): Database
    {
        return $this->db;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $this->castAttribute($name, $value);
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->relations)) {
            return $this->relations[$name];
        }

        if (method_exists($this, $name)) {
            $relation = $this->$name();
            if ($relation instanceof Relation) {
                $results = $relation->getResults();
                $this->relations[$name] = $results;
                return $results;
            }
            return $relation;
        }

        return $this->attributes[$name] ?? null;
    }

    public function setRelation(string $relation, $value): static
    {
        $this->relations[$relation] = $value;
        return $this;
    }

    protected function castAttribute($key, $value)
    {
        if (!isset($this->casts[$key]) || is_null($value)) {
            return $value;
        }

        $type = strtolower($this->casts[$key]);
        switch ($type) {
            case 'int':
            case 'integer':
                return (int)$value;
            case 'real':
            case 'float':
            case 'double':
                return (float)$value;
            case 'bool':
            case 'boolean':
                return (bool)$value;
            case 'array':
            case 'json':
                return is_string($value) ? json_decode($value, true) : (array)$value;
            default:
                return $value;
        }
    }

    // --- Soft Delete Helpers ---

    public function usesSoftDeletes(): bool
    {
        return method_exists($this, 'isSoftDeleteEnabled') && $this->isSoftDeleteEnabled();
    }

    public function withTrashed(): static
    {
        $this->softDeleteScope = 'with';
        return $this;
    }

    public function onlyTrashed(): static
    {
        $this->softDeleteScope = 'only';
        return $this;
    }

    public function withoutTrashed(): static
    {
        $this->softDeleteScope = 'without';
        return $this;
    }

    protected function applySoftDeleteScope(): void
    {
        if (!$this->usesSoftDeletes()) {
            return;
        }

        $column = method_exists($this, 'getDeletedAtColumn') ? $this->getDeletedAtColumn() : 'deleted_at';
        $fullColumn = "{$this->table}.{$column}";

        if ($this->softDeleteScope === 'only') {
            $this->db->whereNotNull($fullColumn);
        } elseif ($this->softDeleteScope === 'with') {
            // No restriction on deleted_at
        } else {
            // Default scope: without trashed
            $this->db->whereNull($fullColumn);
        }
    }

    // --- Relationship Helpers ---

    public function hasOne(string $relatedModel, ?string $foreignKey = null, string $localKey = 'id'): HasOne
    {
        $foreignKey = $foreignKey ?: strtolower(basename(str_replace('\\', '/', static::class))) . '_id';
        return new HasOne($this, $relatedModel, $foreignKey, $localKey);
    }

    public function hasMany(string $relatedModel, ?string $foreignKey = null, string $localKey = 'id'): HasMany
    {
        $foreignKey = $foreignKey ?: strtolower(basename(str_replace('\\', '/', static::class))) . '_id';
        return new HasMany($this, $relatedModel, $foreignKey, $localKey);
    }

    public function belongsTo(string $relatedModel, ?string $foreignKey = null, string $ownerKey = 'id'): BelongsTo
    {
        $foreignKey = $foreignKey ?: strtolower(basename(str_replace('\\', '/', $relatedModel))) . '_id';
        return new BelongsTo($this, $relatedModel, $foreignKey, $ownerKey);
    }

    // --- Relationship Querying & Eager Loading ---

    public static function with($relations): static
    {
        $instance = new static();
        $instance->withRelations = is_array($relations) ? $relations : func_get_args();
        return $instance;
    }

    public static function has(string $relation, string $operator = '>=', int $count = 1): static
    {
        return static::whereHas($relation, null, $operator, $count);
    }

    public static function doesntHave(string $relation): static
    {
        return static::whereDoesntHave($relation);
    }

    public static function whereHas(string $relation, ?callable $callback = null, string $operator = '>=', int $count = 1): static
    {
        $instance = new static();
        return $instance->filterWhereHas($relation, $callback, $operator, $count);
    }

    public function filterWhereHas(string $relation, ?callable $callback = null, string $operator = '>=', int $count = 1): static
    {
        $relationObj = $this->{$relation}();
        if (!$relationObj instanceof Relation) {
            return $this;
        }

        $relatedModelClass = $relationObj->getRelatedModel();
        $relatedModel = new $relatedModelClass();
        $relatedTable = $relatedModel->getTable();
        $foreignKey = $relationObj->getForeignKey();
        $localKey = $relationObj->getLocalKey();

        if ($callback) {
            $callback($relatedModel);
        }

        if ($count === 1 && in_array($operator, ['>=', '>'])) {
            $this->db->whereRaw("EXISTS (SELECT 1 FROM {$relatedTable} WHERE {$relatedTable}.{$foreignKey} = {$this->table}.{$localKey})");
        } else {
            $this->db->whereRaw("(SELECT COUNT(*) FROM {$relatedTable} WHERE {$relatedTable}.{$foreignKey} = {$this->table}.{$localKey}) {$operator} {$count}");
        }

        return $this;
    }

    public static function orWhereHas(string $relation, ?callable $callback = null): static
    {
        $instance = new static();
        return $instance->filterOrWhereHas($relation, $callback);
    }

    public function filterOrWhereHas(string $relation, ?callable $callback = null): static
    {
        $relationObj = $this->{$relation}();
        if (!$relationObj instanceof Relation) {
            return $this;
        }

        $relatedModelClass = $relationObj->getRelatedModel();
        $relatedModel = new $relatedModelClass();
        $relatedTable = $relatedModel->getTable();
        $foreignKey = $relationObj->getForeignKey();
        $localKey = $relationObj->getLocalKey();

        if ($callback) {
            $callback($relatedModel);
        }

        $this->db->orWhereRaw("EXISTS (SELECT 1 FROM {$relatedTable} WHERE {$relatedTable}.{$foreignKey} = {$this->table}.{$localKey})");
        return $this;
    }

    public static function whereDoesntHave(string $relation, ?callable $callback = null): static
    {
        $instance = new static();
        return $instance->filterWhereDoesntHave($relation, $callback);
    }

    public function filterWhereDoesntHave(string $relation, ?callable $callback = null): static
    {
        $relationObj = $this->{$relation}();
        if (!$relationObj instanceof Relation) {
            return $this;
        }

        $relatedModelClass = $relationObj->getRelatedModel();
        $relatedModel = new $relatedModelClass();
        $relatedTable = $relatedModel->getTable();
        $foreignKey = $relationObj->getForeignKey();
        $localKey = $relationObj->getLocalKey();

        if ($callback) {
            $callback($relatedModel);
        }

        $this->db->whereRaw("NOT EXISTS (SELECT 1 FROM {$relatedTable} WHERE {$relatedTable}.{$foreignKey} = {$this->table}.{$localKey})");
        return $this;
    }

    // --- Query Builder Delegation ---

    public static function all(): Collection
    {
        $instance = new static();
        return $instance->get();
    }

    public static function find($id): ?static
    {
        $instance = new static();
        $instance->applySoftDeleteScope();
        try {
            $data = $instance->db->where("{$instance->table}.id", $id)->first();
            return $data ? static::hydrate($data) : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function where($column, $operator = null, $value = null): static
    {
        $instance = new static();
        $instance->db->where($column, $operator, $value);
        return $instance;
    }

    public function whereIn($column, array $values): static
    {
        $this->db->whereIn($column, $values);
        return $this;
    }

    public function orderBy($column, $direction = 'ASC'): static
    {
        $this->db->orderBy($column, $direction);
        return $this;
    }

    public function limit($limit, $offset = 0): static
    {
        $this->db->limit($limit, $offset);
        return $this;
    }

    public function count(): int
    {
        $this->applySoftDeleteScope();
        try {
            return $this->db->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function get(): Collection
    {
        $this->applySoftDeleteScope();
        try {
            $results = $this->db->get();
        } catch (\Exception $e) {
            $results = [];
        }

        $models = array_map(function($data) {
            return static::hydrate($data);
        }, $results);

        $collection = new Collection($models);

        if (!empty($this->withRelations) && $collection->isNotEmpty()) {
            $this->eagerLoadRelations($collection);
        }

        return $collection;
    }

    public function first(): ?static
    {
        $this->applySoftDeleteScope();
        try {
            $data = $this->db->first();
            return $data ? static::hydrate($data) : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    protected function eagerLoadRelations(Collection $models): void
    {
        foreach ($this->withRelations as $relationName) {
            $firstModel = $models->first();
            if (!method_exists($firstModel, $relationName)) {
                continue;
            }

            $relation = $firstModel->{$relationName}();
            if (!$relation instanceof Relation) {
                continue;
            }

            $relatedModelClass = $relation->getRelatedModel();
            $foreignKey = $relation->getForeignKey();
            $localKey = $relation->getLocalKey();

            if ($relation instanceof BelongsTo) {
                $keys = array_filter(array_unique($models->pluck($foreignKey)->all()));
                if (empty($keys)) continue;

                $relatedResults = $relatedModelClass::whereIn($localKey, $keys)->get();
                $dictionary = [];
                foreach ($relatedResults as $related) {
                    $dictionary[$related->{$localKey}] = $related;
                }

                foreach ($models as $model) {
                    $fkVal = $model->{$foreignKey};
                    $model->setRelation($relationName, $dictionary[$fkVal] ?? null);
                }
            } else {
                $keys = array_filter(array_unique($models->pluck($localKey)->all()));
                if (empty($keys)) continue;

                $relatedResults = $relatedModelClass::whereIn($foreignKey, $keys)->get();
                $dictionary = [];
                foreach ($relatedResults as $related) {
                    $dictionary[$related->{$foreignKey}][] = $related;
                }

                foreach ($models as $model) {
                    $pkVal = $model->{$localKey};
                    $items = $dictionary[$pkVal] ?? [];
                    if ($relation instanceof HasOne) {
                        $model->setRelation($relationName, !empty($items) ? $items[0] : null);
                    } else {
                        $model->setRelation($relationName, new Collection($items));
                    }
                }
            }
        }
    }

    public static function create($data)
    {
        $instance = new static();
        try {
            $instance->db->insert($data);
            return static::find($instance->db->lastInsertId());
        } catch (\Exception $e) {
            $model = static::hydrate($data);
            return $model;
        }
    }

    public function update($data)
    {
        try {
            return $this->db->update($data);
        } catch (\Exception $e) {
            foreach ($data as $k => $v) {
                $this->{$k} = $v;
            }
            return true;
        }
    }

    public function delete($id = null)
    {
        if ($id !== null) {
            $this->db->where('id', $id);
        }

        if ($this->usesSoftDeletes()) {
            $column = method_exists($this, 'getDeletedAtColumn') ? $this->getDeletedAtColumn() : 'deleted_at';
            $now = date('Y-m-d H:i:s');
            $this->{$column} = $now;

            if (isset($this->attributes['id']) && $this->attributes['id']) {
                $this->db->where('id', $this->attributes['id']);
            }

            try {
                return $this->db->update([$column => $now]);
            } catch (\Exception $e) {
                return true;
            }
        }

        try {
            return $this->db->delete();
        } catch (\Exception $e) {
            return true;
        }
    }

    protected static function hydrate($data)
    {
        $instance = new static();
        foreach ($data as $key => $value) {
            $instance->{$key} = $value;
        }
        return $instance;
    }

    public function toArray(): array
    {
        $array = $this->attributes;
        foreach ($this->relations as $key => $value) {
            if ($value instanceof Collection) {
                $array[$key] = $value->toArray();
            } elseif (is_object($value) && method_exists($value, 'toArray')) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }
        return $array;
    }
}
