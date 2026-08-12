<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected $productRepo;

    public function __construct(?ProductRepository $productRepo = null)
    {
        $this->productRepo = $productRepo ?? new ProductRepository();
    }

    public function getAllProducts()
    {
        try {
            return $this->productRepo->all();
        } catch (\Throwable $e) {
            return [];
        }
    }

    public function getProductById($id)
    {
        try {
            $product = $this->productRepo->find($id);
            if (!$product) {
                return $this->error('Product not found.');
            }
            return $this->success($product);
        } catch (\Throwable $e) {
            return $this->error('Product not found.');
        }
    }

    public function createProduct(array $data)
    {
        if (empty($data['name']) && empty($data['title'])) {
            return $this->error('Product name is required.');
        }

        try {
            $product = $this->productRepo->create($data);
            return $this->success($product, 'Product created successfully.');
        } catch (\Throwable $e) {
            return $this->error('Database error: ' . $e->getMessage());
        }
    }

    public function updateProduct($id, array $data)
    {
        try {
            $updated = $this->productRepo->update($id, $data);
            if (!$updated) {
                return $this->error('Failed to update product.');
            }
            return $this->success($updated, 'Product updated successfully.');
        } catch (\Throwable $e) {
            return $this->error('Database error: ' . $e->getMessage());
        }
    }

    public function deleteProduct($id)
    {
        try {
            $deleted = $this->productRepo->delete($id);
            if (!$deleted) {
                return $this->error('Failed to delete product.');
            }
            return $this->success(null, 'Product deleted successfully.');
        } catch (\Throwable $e) {
            return $this->error('Database error: ' . $e->getMessage());
        }
    }
}
