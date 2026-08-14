<?php

namespace App\Core;

abstract class ApiResource
{
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = is_array($resource) ? (object) $resource : $resource;
    }

    /**
     * Transform resource into array
     */
    abstract public function toArray(): array;

    /**
     * Conditionally include an attribute.
     */
    public function when(bool $condition, mixed $value, mixed $default = null): mixed
    {
        if ($condition) {
            return is_callable($value) ? $value() : $value;
        }

        return is_callable($default) ? $default() : $default;
    }

    /**
     * Conditionally include a loaded relationship.
     */
    public function whenLoaded(string $relationship, mixed $value = null, mixed $default = null): mixed
    {
        $isLoaded = false;
        if (is_object($this->resource)) {
            if (method_exists($this->resource, 'relationLoaded')) {
                $isLoaded = $this->resource->relationLoaded($relationship);
            } else {
                $isLoaded = isset($this->resource->{$relationship}) && $this->resource->{$relationship} !== null;
            }
        }

        if ($isLoaded) {
            $relVal = is_object($this->resource) ? ($this->resource->{$relationship} ?? null) : null;
            if ($value === null) {
                return $relVal;
            }
            return is_callable($value) ? $value($relVal) : $value;
        }

        return is_callable($default) ? $default() : $default;
    }

    /**
     * Merge array if condition is met.
     */
    public function mergeWhen(bool $condition, array $data): array
    {
        return $condition ? $data : [];
    }

    /**
     * Transform single instance or collection
     */
    public static function make($resource)
    {
        if ($resource === null) {
            return null;
        }

        if (($resource instanceof Collection || is_array($resource)) && isset($resource[0]) && is_object($resource[0])) {
            return static::collection($resource);
        }

        $instance = new static($resource);
        return $instance->resolve();
    }

    /**
     * Resolve resource array.
     */
    public function resolve(): array
    {
        return $this->toArray();
    }

    /**
     * Transform array or collection of resources
     */
    public static function collection($resources): array
    {
        if ($resources instanceof Collection) {
            $resources = $resources->all();
        } elseif ($resources instanceof \Traversable) {
            $resources = iterator_to_array($resources);
        } elseif (!is_array($resources)) {
            $resources = (array) $resources;
        }

        return array_map(function ($item) {
            $instance = new static($item);
            return $instance->resolve();
        }, $resources);
    }

    /**
     * Wrap paginated resource with metadata and pagination links.
     */
    public static function paginated($paginator): array
    {
        $isObj = is_object($paginator);
        $items = ($isObj && method_exists($paginator, 'items')) ? $paginator->items() : (is_array($paginator) ? ($paginator['data'] ?? []) : []);
        $data = static::collection($items);

        return [
            'data' => $data,
            'links' => [
                'first' => ($isObj && method_exists($paginator, 'url')) ? $paginator->url(1) : null,
                'last'  => ($isObj && method_exists($paginator, 'lastPage')) ? $paginator->url($paginator->lastPage()) : null,
                'prev'  => ($isObj && method_exists($paginator, 'previousPageUrl')) ? $paginator->previousPageUrl() : null,
                'next'  => ($isObj && method_exists($paginator, 'nextPageUrl')) ? $paginator->nextPageUrl() : null,
            ],
            'meta' => [
                'current_page' => ($isObj && method_exists($paginator, 'currentPage')) ? $paginator->currentPage() : (is_array($paginator) ? ($paginator['current_page'] ?? 1) : 1),
                'per_page'     => ($isObj && method_exists($paginator, 'perPage')) ? $paginator->perPage() : (is_array($paginator) ? ($paginator['per_page'] ?? 15) : 15),
                'total'        => ($isObj && method_exists($paginator, 'total')) ? $paginator->total() : (is_array($paginator) ? ($paginator['total'] ?? count($items)) : count($items)),
            ]
        ];
    }
}
