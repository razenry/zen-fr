# Membuat CRUD Standar (Service & Repository Pattern)

Salah satu fitur paling utama dalam aplikasi web adalah Create, Read, Update, Delete (CRUD). Dalam Zen PHP Framework, seluruh operasi data dan bisnis diwajibkan menggunakan arsitektur **Service & Repository Pattern** agar kode rapi, modular, dan terstruktur.

---

## 1. Membuat Migrasi & Skema Tabel Database

Gunakan Zen CLI untuk membuat file migrasi baru:

```bash
php zen make:migration create_products_table
```

Buka file migrasi di `database/migrations/xxxx_create_products_table.php` dan tentukan skema kolom:

```php
use Database\Schema;
use Database\Blueprint;

class CreateProductsTable
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
```

Jalankan migrasi:
```bash
php zen migrate
```

---

## 2. Membuat Model, Repository, dan Service

Gunakan generator Zen CLI untuk membuat seluruh komponen arsitektur:

```bash
php zen make:model Product
php zen make:repository Product
php zen make:service Product
php zen make:controller ProductController
```

### Model (`app/models/Product.php`)

```php
namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    protected $table = 'products';
}
```

### Repository (`app/repositories/ProductRepository.php`)

```php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Product::class;
    }
}
```

### Service (`app/services/ProductService.php`)

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

    public function getProductById($id)
    {
        $product = $this->productRepo->find($id);
        if (!$product) {
            return $this->error('Produk tidak ditemukan.');
        }
        return $this->success($product);
    }

    public function createProduct(array $data)
    {
        if (empty($data['name']) || empty($data['price'])) {
            return $this->error('Nama dan harga produk wajib diisi.');
        }

        $product = $this->productRepo->create($data);
        return $this->success($product, 'Produk berhasil ditambahkan.');
    }

    public function updateProduct($id, array $data)
    {
        $updated = $this->productRepo->update($id, $data);
        if (!$updated) {
            return $this->error('Gagal mengupdate produk.');
        }
        return $this->success($updated, 'Produk berhasil diperbarui.');
    }

    public function deleteProduct($id)
    {
        $deleted = $this->productRepo->delete($id);
        if (!$deleted) {
            return $this->error('Gagal menghapus produk.');
        }
        return $this->success(null, 'Produk berhasil dihapus.');
    }
}
```

---

## 3. Slim Controller (`app/controllers/ProductController.php`)

Controller bertugas mengelola request HTTP dan memanggil Service layer tanpa melakukan query database langsung:

```php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\App;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(?ProductService $productService = null)
    {
        $this->productService = $productService ?? new ProductService();
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        $data['title'] = 'Daftar Produk';
        $data['products'] = $products;
        App::Layout('main', 'products/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Produk';
        App::Layout('main', 'products/create', $data);
    }

    public function store()
    {
        $result = $this->productService->createProduct($_POST);

        if ($result['status']) {
            $_SESSION['success'] = $result['message'];
            $this->redirect(route('products.index'));
        }

        $_SESSION['error'] = $result['message'];
        $this->redirect(route('products.create'));
    }

    public function edit($id)
    {
        $result = $this->productService->getProductById($id);
        if (!$result['status']) {
            $_SESSION['error'] = $result['message'];
            $this->redirect(route('products.index'));
        }

        $data['title'] = 'Edit Produk';
        $data['product'] = $result['data'];
        App::Layout('main', 'products/edit', $data);
    }

    public function update($id)
    {
        $result = $this->productService->updateProduct($id, $_POST);

        if ($result['status']) {
            $_SESSION['success'] = $result['message'];
            $this->redirect(route('products.index'));
        }

        $_SESSION['error'] = $result['message'];
        $this->redirect(route('products.edit', ['id' => $id]));
    }

    public function destroy($id)
    {
        $result = $this->productService->deleteProduct($id);
        $_SESSION['success'] = $result['message'];
        $this->redirect(route('products.index'));
    }
}
```

---

## 4. Mendaftarkan Route (`routes/web.php`)

```php
use App\Core\Route;
use App\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
```

---

## 5. Membuat View

Buat folder `app/views/products/` dan tambahkan file-file view berikut:

### `index.php` (Daftar Produk)
```html
<div class="container py-4">
    <div class="flex justify-between items-center mb-4">
        <h1>Daftar Produk</h1>
        <a href="<?= route('products.create') ?>" class="btn btn-primary">Tambah Produk</a>
    </div>

    <table class="table border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product->id ?></td>
                <td><?= htmlspecialchars($product->name) ?></td>
                <td>Rp <?= number_format($product->price, 0, ',', '.') ?></td>
                <td>
                    <a href="<?= route('products.edit', ['id' => $product->id]) ?>">Edit</a>
                    <form action="<?= route('products.destroy', ['id' => $product->id]) ?>" method="POST" style="display:inline;">
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
```

---

## Kesimpulan

Dengan mengikuti tutorial ini, struktur CRUD aplikasi Anda konsisten 100% menggunakan Service & Repository Pattern yang rapi, aman, dan mudah diuji.
