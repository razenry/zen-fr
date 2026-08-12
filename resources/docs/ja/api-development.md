# RESTful API 開発

Zen PHP Framework は、一貫性があり安全で高速な RESTful API を構築するためのエンタープライズ級バックエンド基盤を提供します。

---

## 1. API 専用ルーティングとグループ化

API エンドポイントは `routes/api.php` に分離されており、プレフィックスやミドルウェアのグループ化に対応しています：

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

## 2. 標準レスポンス (`ApiResponse` Trait)

```php
namespace App\Controllers\Api;

use App\Core\Controller;
use App\Core\ApiResponse;

class ProductApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->sendSuccess($data, 'データ取得に成功しました');
    }
}
```

---

## 3. DTO 変換レイヤー (`ApiResource`)

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

## 4. 入力バリデーション (`Validator`)

検証失敗時には自動的に 422 Unprocessable Entity を返却します：

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
