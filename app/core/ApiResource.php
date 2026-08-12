<?php

namespace App\Core;

abstract class ApiResource
{
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Transform resource into array
     */
    abstract public function toArray(): array;

    /**
     * Transform single instance or collection
     */
    public static function make($resource)
    {
        if ($resource === null) {
            return null;
        }

        if (is_array($resource) && isset($resource[0]) && is_object($resource[0])) {
            return static::collection($resource);
        }

        $instance = new static($resource);
        return $instance->toArray();
    }

    /**
     * Transform array collection of resources
     */
    public static function collection(array $resources): array
    {
        return array_map(function ($item) {
            $instance = new static($item);
            return $instance->toArray();
        }, $resources);
    }
}
