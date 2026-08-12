# Service & Repository パターン

Zen PHP Framework では、ビジネスロジックとデータアクセスを分断し、コードの保守性とテスト容易性を高めるために **Service & Repository パターン** を標準化しています。

---

## 1. レイヤー構造

- **Controller**: HTTP リクエストを処理し、Service に業務処理を移譲します。
- **Service レイヤー**: ビジネスルール、ドメインロジック、検証を実行します。
- **Repository レイヤー**: データベースクエリおよびデータアクセスを担当します。
- **Model**: エンティティテーブルを表現します。

---

## 2. 実装例

```php
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
        return $this->productRepo->all();
    }
}
```
