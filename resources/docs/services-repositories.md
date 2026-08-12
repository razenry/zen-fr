# Service & Repository Pattern

Zen PHP Framework menerapkan Service & Repository Pattern sebagai standar arsitektur untuk memisahkan tanggung jawab antara data access layer, business logic layer, dan presentation/controller layer.

---

## Arsitektur Layer

```
[ HTTP Request ] ──> [ Controller ] ──> [ Service (Business Logic) ] ──> [ Repository (Data Access) ] ──> [ Model / Database ]
```

1. **Controller**: Menerima request HTTP, memvalidasi input dasar, dan mengembalikan response (View/JSON). Controller tidak boleh melakukan query database langsung.
2. **Service**: Berisi logika bisnis (business logic), transaksi kompleks, penanganan error, dan integrasi modul.
3. **Repository**: Mengabstraksi akses data (CRUD), pencarian, dan enkapsulasi query builder.

---

## Struktur Direktori

```
app/
├── repositories/
│   ├── RepositoryInterface.php
│   ├── BaseRepository.php
│   ├── UserRepository.php
│   └── PostRepository.php
├── services/
│   ├── BaseService.php
│   ├── UserService.php
│   └── PostService.php
```

---

## Membuat Repository & Service Baru via CLI

Gunakan perintah `php zen` untuk membuat repository dan service dengan mudah:

```bash
# Membuat Repository
php zen make:repository Product

# Membuat Service
php zen make:service Product
```

---

## Contoh Penggunaan

### 1. Repository (`app/repositories/PostRepository.php`)

```php
namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Post::class;
    }

    public function getLatestPosts($limit = 10)
    {
        return Post::where('status', '=', 'published')->get();
    }
}
```

### 2. Service (`app/services/PostService.php`)

```php
namespace App\Services;

use App\Repositories\PostRepository;

class PostService extends BaseService
{
    protected $postRepository;

    public function __construct(?PostRepository $postRepository = null)
    {
        $this->postRepository = $postRepository ?? new PostRepository();
    }

    public function createPost(array $data)
    {
        if (empty($data['title']) || empty($data['content'])) {
            return $this->error('Judul dan konten wajib diisi.');
        }

        $post = $this->postRepository->create($data);
        return $this->success($post, 'Post berhasil dibuat.');
    }
}
```

### 3. Controller (`app/controllers/PostController.php`)

```php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(?PostService $postService = null)
    {
        $this->postService = $postService ?? new PostService();
    }

    public function store()
    {
        $result = $this->postService->createPost($_POST);

        if ($result['status']) {
            $_SESSION['success'] = $result['message'];
            $this->redirect(route('posts'));
        }

        $_SESSION['error'] = $result['message'];
        $this->redirect(route('posts.create'));
    }
}
```

---

## Keuntungan Untuk Solo & Team Developer

- **Reusability**: Logika bisnis di Service dapat digunakan kembali pada Controller, API, atau CLI task.
- **Testability**: Memudahkan penciptaan Unit Test karena perlapisan kode yang terisolasi.
- **Maintainability**: Memudahkan tim mengelola basis kode yang besar tanpa terjadi kekacauan pada Controller (Fat Controller anti-pattern).
