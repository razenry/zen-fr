# RESTful API Development

Zen PHP Framework provides a robust, enterprise-grade backend foundation for building clean, consistent, secure, and high-performance RESTful APIs.

---

## 1. Dedicated API Routes & Grouping

API endpoints are isolated in `routes/api.php` with built-in route prefixing and middleware grouping:

```php
use App\Core\Route;
use App\Middleware\CorsMiddleware;
use App\Controllers\Api\ProductApiController;

Route::group(['prefix' => '/api/v1', 'middleware' => [CorsMiddleware::class]], function () {
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::post('/products', [ProductApiController::class, 'store']);
    Route::get('/products/{id}', [ProductApiController::class, 'show']);
    Route::put('/products/{id}', [ProductApiController::class, 'update']);
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);
});
```

---

## 2. Standardized Response Trait (`ApiResponse`)

Use `App\Core\ApiResponse` trait in API Controllers for unified JSON responses:

```php
namespace App\Controllers\Api;

use App\Core\Controller;
use App\Core\ApiResponse;

class ProductApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->sendSuccess($data, 'Products retrieved successfully');
    }
}
```

---

## 3. Data Transformation Layer (`ApiResource`)

Transform models into clean JSON Data Transfer Objects (DTOs):

```php
namespace App\Resources;

use App\Core\ApiResource;

class ProductResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id'    => (int) $this->resource->id,
            'name'  => $this->resource->name,
            'price' => (int) $this->resource->price
        ];
    }
}
```

---

## 4. Declarative Validation (`Validator`)

Schema payload validation returning automatic 422 Unprocessable Entity HTTP responses:

```php
use App\Core\Validator;

$validator = Validator::make($input, [
    'name'  => 'required|string|min:3',
    'price' => 'required|numeric'
]);

if ($validator->fails()) {
    return $this->sendValidationError($validator->errors());
}
```

---

## 5. Bearer Token Auth & CORS

- Stateless Bearer Token / JWT authentication via `App\Core\TokenAuth`.
- Preflight OPTIONS & CORS headers via `App\Middleware\CorsMiddleware`.
