<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Product::class;
    }
}
