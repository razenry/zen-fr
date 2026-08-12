# API Development (RESTful Architecture)

Zen PHP Framework menyediakan fondasi backend berskala enterprise untuk membangun RESTful API yang rapi, konsisten, aman, dan berkinerja tinggi.

---

## 1. Struktur Rute API & Route Grouping

Seluruh rute API didefinisikan secara terpisah pada berkas `routes/api.php`. Zen PHP mendukung pengelompokan rute (*Route Grouping*), *prefixing*, dan *middleware*:

```php
use App\Core\Route;
use App\Middleware\CorsMiddleware;
use App\Controllers\Api\ProductApiController;

Route::group(['prefix' => '/api/v1', 'middleware' => [CorsMiddleware::class]], function () {
    Route::get('/products', [ProductApiController::class, 'index'])->name('api.products.index');
    Route::post('/products', [ProductApiController::class, 'store'])->name('api.products.store');
    Route::get('/products/{id}', [ProductApiController::class, 'show'])->name('api.products.show');
    Route::put('/products/{id}', [ProductApiController::class, 'update'])->name('api.products.update');
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy'])->name('api.products.destroy');
});
```

---

## 2. Generator CLI untuk RESTful API

Gunakan perintah `php zen` untuk membuat komponen API dengan mudah:

```bash
# Membuat API Controller
php zen make:api-controller Api/v1/OrderApiController

# Membuat API Resource Transformer
php zen make:resource OrderResource

# Membuat Middleware HTTP
php zen make:middleware AuthMiddleware
```

---

## 3. Standardized API Response Trait

Setiap API Controller meng-use trait `App\Core\ApiResponse` untuk menghasilkan respon JSON yang konsisten di seluruh aplikasi:

```php
namespace App\Controllers\Api;

use App\Core\Controller;
use App\Core\ApiResponse;

class OrderApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->sendSuccess($data, 'Data berhasil diambil');
    }

    public function show($id)
    {
        if (!$data) {
            return $this->sendNotFound('Data tidak ditemukan');
        }
        return $this->sendSuccess($data);
    }
}
```

### Helper Response Terstandar:
- `$this->sendSuccess($data, $message, $code = 200)`
- `$this->sendError($message, $errors = null, $code = 400)`
- `$this->sendValidationError($errors, $message = 'Validation failed')` (Status 422)
- `$this->sendUnauthorized($message = 'Unauthorized access')` (Status 401)
- `$this->sendForbidden($message = 'Access forbidden')` (Status 403)
- `$this->sendNotFound($message = 'Resource not found')` (Status 404)

---

## 4. API Resource Transformer (DTO Layer)

`ApiResource` berfungsi mengubah data model/array menjadi struktur JSON DTO yang rapi, aman, dan terformat tanpa membocorkan field sensitif seperti password:

```php
namespace App\Resources;

use App\Core\ApiResource;

class ProductResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id'          => (int) $this->resource->id,
            'name'        => $this->resource->name,
            'price'       => (int) $this->resource->price,
            'description' => $this->resource->description ?? '',
            'created_at'  => $this->resource->created_at
        ];
    }
}
```

### Penggunaan di Controller:

```php
// Single Resource
return $this->sendSuccess(ProductResource::make($product));

// Resource Collection
return $this->sendSuccess(ProductResource::collection($products));
```

---

## 5. Declarative Payload Validation

`App\Core\Validator` menyediakan mekanisme validasi skema payload JSON yang deklaratif dan mengembalikan error 422 Unprocessable Entity secara otomatis jika gagal:

```php
use App\Core\Validator;

$input = json_decode(file_get_contents('php://input'), true);

$validator = Validator::make($input, [
    'name'  => 'required|string|min:3',
    'email' => 'required|email|unique:users,email',
    'price' => 'required|numeric'
]);

if ($validator->fails()) {
    return $this->sendValidationError($validator->errors());
}
```

---

## 6. Stateless Bearer Token / JWT Authentication

Zen PHP menyediakan pengelola otentikasi stateless via `App\Core\TokenAuth`:

```php
use App\Core\TokenAuth;

// 1. Generate token saat login berhasil
$token = TokenAuth::generateToken($user->id);

// 2. Verifikasi Bearer Token pada Middleware
$token = TokenAuth::getBearerToken();
$payload = TokenAuth::verifyToken($token);

if (!$payload) {
    return $this->sendUnauthorized('Token tidak valid atau telah kadaluarsa');
}
```

---

## 7. Keunggulan Arsitektur API Zen PHP

- **Konsistensi Tinggi**: Response JSON memiliki skema seragam di seluruh endpoint.
- **Mudah Di-maintain**: Pemisahan jelas antara Routing (`routes/api.php`), Validation (`Validator`), Transformation (`ApiResource`), Logika Bisnis (`Service`), dan Akses Data (`Repository`).
- **Skalabilitas Enterprise**: Siap digunakan untuk aplikasi mobile (iOS/Android), Single Page Application (React/Vue/Svelte), maupun microservices inter-server.
