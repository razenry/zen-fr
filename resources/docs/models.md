# Models & Collection System

Sekolah / setiap tabel di database memiliki class "Model" padanannya untuk memudahkan proses interaksi dengan tabel tersebut. Models diletakkan pada folder `app/models/`.

## Mendefinisikan Model

Model secara bawaan meng-extend `App\Core\Model`. Nama class pada model haruslah dalam bentuk tunggal (Singular), misalnya `Post`, maka model akan berasumsi tabelnya bernama jamak (Plural) yaitu `posts`.

```php
namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected $table = 'posts'; // Opsional, model akan menebak namanya jika tidak ada
}
```

---

## Soft Delete System (`App\Core\SoftDeletes`)

Zen PHP Framework v3.3.0 mendukung **Soft Delete**, yaitu penghapusan record secara logis dengan mengisi kolom `deleted_at` tanpa menghapus data secara fisik dari database.

### 1. Menambahkan Trait SoftDeletes

```php
namespace App\Models;

use App\Core\Model;
use App\Core\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    // protected $deletedAtColumn = 'deleted_at'; // Opsional jika nama kolom berbeda
}
```

### 2. Skema Migrasi Blueprint

Di dalam file migrasi, Anda dapat menambahkan kolom soft deletes:

```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->timestamps();
    $table->softDeletes(); // Menambahkan kolom deleted_at TIMESTAMP NULL DEFAULT NULL
});
```

### 3. Penggunaan Soft Delete

```php
$post = Post::find(1);

// Soft Delete (Mengisi deleted_at dengan timestamp saat ini)
$post->delete();

// Cek apakah record di-soft delete
if ($post->trashed()) {
    // Record telah terhapus secara soft delete
}

// Restorasi record (Mengosongkan deleted_at)
$post->restore();

// Penghapusan permanen dari database
$post->forceDelete();
```

### 4. Query Scoping Soft Delete

Model yang menggunakan `SoftDeletes` secara otomatis memfilter data yang belum dihapus (`deleted_at IS NULL`). Anda dapat mengatur scope berikut:

```php
// Mengambil hanya record aktif (bawaan)
$activePosts = Post::all();

// Mengambil semua record (aktif + soft deleted)
$allPosts = Post::withTrashed()->get();

// Mengambil hanya record yang di-soft delete
$trashedPosts = Post::onlyTrashed()->get();
```

---

## Collection System (`App\Core\Collection`)

Hasil query `Model::all()` dan `Model::where()->get()` mengembalikan objek **Collection** (`App\Core\Collection`) yang kompatibel dengan manipulasi array standar (`ArrayAccess`, `Countable`, `IteratorAggregate`).

### Metode Utama Collection

```php
use App\Core\Collection;

$posts = Post::all();

// Filter data
$filtered = $posts->filter(fn($post) => $post->price > 100000);

// Transformasi data (Map)
$titles = $posts->map(fn($post) => strtoupper($post->title));

// Mengambil atribut spesifik (Pluck)
$productNames = $posts->pluck('name')->all();

// Filter Soft Delete pada Collection
$deletedItems = $posts->onlyTrashed();
$activeItems = $posts->withoutTrashed();

// Konversi ke Array atau JSON
$arrayData = $posts->toArray();
$jsonData = $posts->toJson();
```

---

## Operasi CRUD Dasar

### Insert (Membuat Record Baru)

```php
$post = Post::create([
    'title' => 'Judul Artikel',
    'body' => 'Isi artikel...',
    'user_id' => 1
]);
```

### Select (Mengambil Data)

```php
// Mengambil semua data sebagai Collection
$posts = Post::all();

// Mengambil satu data berdasarkan ID
$post = Post::find(1);

// Mengambil data dengan kriteria WHERE
$activePosts = Post::where('status', 'active')->get();
```

### Update (Mengubah Data)

```php
$post = Post::find(1);
$post->update([
    'title' => 'Judul Baru'
]);
```

### Delete (Menghapus Data)

```php
$post = Post::find(1);
$post->delete();
```
