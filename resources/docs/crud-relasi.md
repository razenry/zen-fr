# Tutorial CRUD Relasi & Components

Panduan ini membimbing Anda membuat aplikasi CRUD Relasional (One-to-Many) yang bersih, modular, dan modern menggunakan arsitektur Service & Repository Pattern, Reusable UI Components, serta Zen Pulse.

Dalam contoh ini, kita membuat sistem pengelolaan Kategori & Produk (Setiap Kategori memiliki banyak Produk).

---

## 1. Skema Migrasi Database

Gunakan perintah Zen CLI untuk membuat dua migrasi:

```bash
php zen make:migration create_categories_table
php zen make:migration create_products_table
```

### Migrasi Kategori (`database/migrations/xxxx_create_categories_table.php`)

```php
use Database\Schema;
use Database\Blueprint;

class CreateCategoriesTable
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
```

### Migrasi Produk (`database/migrations/xxxx_create_products_table.php`)

```php
use Database\Schema;
use Database\Blueprint;

class CreateProductsTable
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title');
            $table->integer('price');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
```

Jalankan migrasi ke database:
```bash
php zen migrate
```

---

## 2. Membuat Model dengan Relasi

Buat model `Category` dan `Product` menggunakan Zen CLI:

```bash
php zen make:model Category
php zen make:model Product
```

### Model Category (`app/models/Category.php`)

```php
namespace App\Models;

use App\Core\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return Product::where('category_id', '=', $this->id)->get();
    }
}
```

### Model Product (`app/models/Product.php`)

```php
namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return Category::find($this->category_id);
    }
}
```

---

## 3. Membuat Repository & Service

Gunakan Zen CLI generator:

```bash
php zen make:repository Category
php zen make:repository Product
php zen make:service Category
php zen make:service Product
```

### ProductRepository (`app/repositories/ProductRepository.php`)

```php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Product::class;
    }

    public function getByCategory($categoryId)
    {
        return Product::where('category_id', '=', $categoryId)->get();
    }
}
```

### ProductService (`app/services/ProductService.php`)

```php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;

class ProductService extends BaseService
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(?ProductRepository $productRepo = null, ?CategoryRepository $categoryRepo = null)
    {
        $this->productRepo = $productRepo ?? new ProductRepository();
        $this->categoryRepo = $categoryRepo ?? new CategoryRepository();
    }

    public function createProduct(array $data)
    {
        if (empty($data['title']) || empty($data['price']) || empty($data['category_id'])) {
            return $this->error('Kategori, Judul, dan Harga wajib diisi.');
        }

        $product = $this->productRepo->create($data);
        return $this->success($product, 'Produk berhasil ditambahkan.');
    }

    public function getProductsWithCategories()
    {
        $products = $this->productRepo->all();
        foreach ($products as $prod) {
            $cat = $prod->category();
            $prod->category_name = $cat ? $cat->name : 'Uncategorized';
        }
        return $products;
    }
}
```

---

## 4. Membuat Reusable UI Components

Zen PHP mendukung pemisahan UI menjadi komponen terisolasi di `app/views/components/`.

### Komponen Badge Kategori (`app/views/components/category_badge.php`)

```html
<span class="inline-block px-3 py-1 text-xs font-semibold bg-indigo-100 text-indigo-700 rounded-full">
    <?= htmlspecialchars($category_name) ?>
</span>
```

### Komponen Card Produk (`app/views/components/product_card.php`)

```html
<div class="bg-white p-6 rounded-xl shadow border border-gray-100 flex flex-col justify-between">
    <div>
        <div class="flex justify-between items-center mb-2">
            <!-- Memanggil Komponen Badge Kategori -->
            <?php \App\Core\App::Component('category_badge', ['category_name' => $product->category_name]); ?>
            <span class="text-sm font-bold text-emerald-600">Rp <?= number_format($product->price, 0, ',', '.') ?></span>
        </div>
        <h3 class="text-lg font-bold text-gray-800 mb-2"><?= htmlspecialchars($product->title) ?></h3>
        <p class="text-gray-600 text-sm mb-4"><?= htmlspecialchars($product->description) ?></p>
    </div>
    <div class="flex gap-2 border-t pt-3">
        <a href="<?= route('products.edit', ['id' => $product->id]) ?>" class="text-xs bg-amber-50 text-amber-600 px-3 py-1.5 rounded font-medium">Edit</a>
        <form action="<?= route('products.delete', ['id' => $product->id]) ?>" method="POST" style="display:inline;">
            <button type="submit" class="text-xs bg-rose-50 text-rose-600 px-3 py-1.5 rounded font-medium" onclick="return confirm('Hapus produk ini?')">Hapus</button>
        </form>
    </div>
</div>
```

---

## 5. Komponen Filter Realtime Zen Pulse

Buat komponen reaktif Zen Pulse untuk memfilter produk berdasarkan kategori secara instant tanpa reload halaman:

```bash
php zen make:pulse ProductFilter
```

### Komponen Logika (`app/pulse/ProductFilter.php`)

```php
namespace App\Pulse;

use App\Core\ZenPulseComponent;
use App\Core\App;
use App\Services\ProductService;
use App\Repositories\CategoryRepository;

class ProductFilter extends ZenPulseComponent
{
    public $selectedCategory = 'all';

    public function render()
    {
        $productService = new ProductService();
        $categoryRepo = new CategoryRepository();

        $categories = $categoryRepo->all();
        $products = $productService->getProductsWithCategories();

        if ($this->selectedCategory !== 'all') {
            $products = array_filter($products, function($p) {
                return (string)$p->category_id === (string)$this->selectedCategory;
            });
        }

        ob_start();
        App::View('pulse/product_filter', [
            'categories' => $categories,
            'products'   => $products,
            'selected'   => $this->selectedCategory
        ]);
        return ob_get_clean();
    }
}
```

### Komponen Tampilan (`app/views/pulse/product_filter.php`)

```html
<div>
    <div class="flex items-center gap-3 mb-6">
        <label class="font-bold text-gray-700">Filter Kategori (Zen Pulse):</label>
        <select zen-model="selectedCategory" class="px-4 py-2 border rounded-lg bg-white">
            <option value="all">Semua Kategori</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($products as $product): ?>
            <!-- Memanggil Reusable UI Component product_card -->
            <?php \App\Core\App::Component('product_card', ['product' => $product]); ?>
        <?php endforeach; ?>
    </div>
</div>
```

---

## Kesimpulan

Dengan mengombinasikan Service-Repository Pattern, Reusable UI Components, dan Zen Pulse Engine, aplikasi Anda memiliki struktur yang sangat bersih, mudah dirawat baik oleh pengembang solo maupun tim besar, serta memiliki performa yang sangat cepat.
