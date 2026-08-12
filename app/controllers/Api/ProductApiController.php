<?php

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Core\ApiResponse;
use App\Core\Validator;
use App\Services\ProductService;
use App\Resources\ProductResource;

class ProductApiController extends Controller
{
    use ApiResponse;

    protected $productService;

    public function __construct(?ProductService $productService = null)
    {
        $this->productService = $productService ?? new ProductService();
    }

    /**
     * GET /api/v1/products
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        $formatted = ProductResource::collection($products);
        return $this->sendSuccess($formatted, 'Products retrieved successfully');
    }

    /**
     * GET /api/v1/products/{id}
     */
    public function show($id)
    {
        $result = $this->productService->getProductById($id);
        if (!$result['status']) {
            return $this->sendNotFound('Product not found');
        }

        $formatted = ProductResource::make($result['data']);
        return $this->sendSuccess($formatted, 'Product details retrieved successfully');
    }

    /**
     * POST /api/v1/products
     */
    public function store()
    {
        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

        $validator = Validator::make($input, [
            'name'  => 'required|string|min:3',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors());
        }

        $result = $this->productService->createProduct($input);
        if (!$result['status']) {
            return $this->sendError($result['message']);
        }

        $formatted = ProductResource::make($result['data']);
        return $this->sendSuccess($formatted, 'Product created successfully', 201);
    }

    /**
     * PUT /api/v1/products/{id}
     */
    public function update($id)
    {
        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

        $validator = Validator::make($input, [
            'name'  => 'required|string|min:3',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors());
        }

        $result = $this->productService->updateProduct($id, $input);
        if (!$result['status']) {
            return $this->sendError($result['message']);
        }

        $formatted = ProductResource::make($result['data']);
        return $this->sendSuccess($formatted, 'Product updated successfully');
    }

    /**
     * DELETE /api/v1/products/{id}
     */
    public function destroy($id)
    {
        $result = $this->productService->deleteProduct($id);
        if (!$result['status']) {
            return $this->sendNotFound('Product not found or failed to delete');
        }

        return $this->sendSuccess(null, 'Product deleted successfully');
    }
}
