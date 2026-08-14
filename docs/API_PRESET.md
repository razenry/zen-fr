# Zen PHP Framework — Enterprise REST API Dedicated Guide

Zen PHP Framework v9.0.0 provides a high-performance **Dedicated REST API Mode** with standardized Enterprise Envelopes, Bearer token authentication, CORS middleware, API Resources, and **Swagger OpenAPI UI** at `/docs`.

---

## ⚡ Activation

Run the CLI command:

```bash
php zen preset:api
```

This command cleans up unneeded HTML views and configures `routes/web.php` to serve Swagger UI at `/docs`.

---

## 🌐 Enterprise API Response Envelopes

All API endpoints return JSON conforming to the Enterprise Standard Envelope:

### Success Envelope
```json
{
  "status": true,
  "success": true,
  "message": "Products retrieved successfully",
  "data": [
    {
      "id": 1,
      "name": "Zen PHP Pro",
      "price": 150000
    }
  ],
  "meta": {
    "page": 1,
    "per_page": 15,
    "total": 100
  }
}
```

### Error Envelope
```json
{
  "status": false,
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": ["The email field is required."]
  },
  "code": 422
}
```

---

## 🛠️ API Controller Implementation (`app/controllers/ProductController.php`)

```php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\ProductService;
use App\Core\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(?ProductService $productService = null)
    {
        $this->productService = $productService ?? new ProductService();
    }

    public function index()
    {
        $result = $this->productService->getAllProducts();
        return $this->jsonResponse($result);
    }

    public function store()
    {
        $request = Request::capture();
        $data = $request->all();

        $result = $this->productService->createProduct($data);
        return $this->jsonResponse($result, $result['success'] ? 201 : 400);
    }
}
```

---

## 📖 Swagger OpenAPI Interactive UI (`/docs`)

Open your browser at `http://127.0.0.1:8000/docs` to access the interactive Swagger OpenAPI UI, allowing developers to test API endpoints directly.
