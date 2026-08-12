# Service & Repository Pattern

In Zen PHP Framework, data operations and business logic are structured using the **Service & Repository Pattern** to maintain clean, scalable, and testable codebases.

---

## 1. Architectural Layers

- **Controller**: Handles HTTP requests and delegates business actions to Services.
- **Service Layer**: Implements business rules, validation, and domain logic.
- **Repository Layer**: Handles database queries and data access operations.
- **Model**: Represents database entity tables.

---

## 2. Example Service Implementation

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
