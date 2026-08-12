<?php

namespace App\Resources;

use App\Core\ApiResource;

class ProductResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id'            => (int) $this->resource->id,
            'name'          => $this->resource->name ?? $this->resource->title ?? '',
            'price'         => (int) ($this->resource->price ?? 0),
            'description'   => $this->resource->description ?? '',
            'category_name' => $this->resource->category_name ?? null,
            'created_at'    => $this->resource->created_at ?? null,
            'updated_at'    => $this->resource->updated_at ?? null
        ];
    }
}
