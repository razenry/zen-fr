# Tutorial CRUD Relasi, Relation Querying & Components

Panduan ini membimbing Anda membuat aplikasi CRUD Relasional (One-to-Many / BelongsTo / HasOne) yang bersih, modular, dan modern menggunakan arsitektur Service & Repository Pattern, Laravel-like Relationship Querying (`whereHas`, `has`, `with`, relation chaining), Reusable UI Components, serta Zen Pulse.

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
            $table->softDeletes(); // Opsional Soft Delete
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
            $table->softDeletes();
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

## 2. Membuat Model dengan Relasi Ekspresif

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
        return $this->hasMany(Product::class, 'category_id', 'id');
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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
```

---

## 3. Sistem Query Relasi Seperti Laravel (v3.3.0)

Zen PHP Framework v3.3.0 mendukung fitur **Query Relasi Gaya Laravel**:

### A. Dynamic Relation Query Chaining

Memanggil method relasi sebagai method `$category->products()` mengembalikan objek `Relation` yang dapat dirantai dengan metode query builder tambahan:

```php
$category = Category::find(1);

// Filter produk milik kategori dengan kriteria tambahan
$activeProducts = $category->products()->where('price', '>', 50000)->get();

// Menghitung jumlah produk terelasi
$productCount = $category->products()->count();
```

Mengakses relasi sebagai properti `$category->products` secara otomatis mengeksekusi query dan mengembalikan `Collection` / `Model` hasil relasi.

### B. Eager Loading (`with`)

Mencegah masalah N+1 Query dengan memuat relasi sekaligus dalam batch:

```php
// Memuat produk beserta informasi kategorinya
$products = Product::with('category')->get();

foreach ($products as $product) {
    echo $product->title . ' - Kategori: ' . $product->category->name;
}
```

### C. Filtering Keberadaan Relasi (`has` & `whereHas`)

Mencari record induk berdasarkan ada/tidaknya record pada relasi:

```php
// Mengambil semua kategori yang memiliki setidaknya 1 produk
$categoriesWithProducts = Category::has('products')->get();

// Mengambil kategori yang memiliki produk dengan harga di atas 100.000
$premiumCategories = Category::whereHas('products', function($query) {
    $query->where('price', '>', 100000);
})->get();

// Mengambil kategori yang TIDAK memiliki produk
$emptyCategories = Category::doesntHave('products')->get();
```

---

## 4. Membuat Repository & Service

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

    public function getProductsWithCategory()
    {
        return Product::with('category')->get();
    }
}
```

---

## 5. Reusable UI Components & Zen Pulse

Zen PHP mendukung pemisahan UI menjadi komponen terisolasi di `app/views/components/` serta reaktivitas realtime menggunakan Zen Pulse.

```php
// Contoh pemanggilan komponen
\App\Core\App::Component('category_badge', ['category_name' => $product->category->name]);
```

---

## Kesimpulan

Dengan mengombinasikan Service-Repository Pattern, Eager Loading (`with`), Relation Querying (`whereHas`), Reusable UI Components, dan Zen Pulse Engine, aplikasi Anda memiliki struktur yang sangat bersih, kuat, dan performan tinggi.
