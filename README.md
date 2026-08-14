# Zen PHP Framework (v4.1.0 Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, Zen Pulse Reactive Engine, Multi-Disk File Storage System, Cache Engine, Queue Jobs, Gate Authorization & Policies, API Resources, serta Pengujian Otomatis Pest PHP.

---

## 📦 Pilihan Versi & Cara Download (Version Switcher)

Zen PHP menggunakan **Git Release Branching System** (seperti Bootstrap) di mana setiap versi utama/patch memiliki branch dan tag terpisah. Anda dapat memilih dan men-download versi framework yang sesuai kebutuhan project Anda.

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v4.1.0** | **Latest (Recommended)** | `v4.1.0` | `git clone -b v4.1.0 https://github.com/razenry/zen-fr.git` |
| **v4.0.0** | Release Stable | `v4.0.0` | `git clone -b v4.0.0 https://github.com/razenry/zen-fr.git` |
| **v3.4.0** | Stable Release | `v3.4.0` | `git clone -b v3.4.0 https://github.com/razenry/zen-fr.git` |
| **v3.3.0** | Stable Release | `v3.3.0` | `git clone -b v3.3.0 https://github.com/razenry/zen-fr.git` |
| **v3.0.0** | Legacy Release | `v3.0.0` | `git clone -b v3.0.0 https://github.com/razenry/zen-fr.git` |

### 🚀 Cara Install & Switch Versi

#### Option 1: Download / Clone Versi Tertentu Secara Langsung
```bash
# Clone versi terbaru v4.1.0
git clone -b v4.1.0 https://github.com/razenry/zen-fr.git my-project

# Atau clone versi v4.0.0 / v3.4.0
git clone -b v4.0.0 https://github.com/razenry/zen-fr.git my-project
```

#### Option 2: Switch Versi Pada Repository Yang Sudah Ada
```bash
# Ambil semua branch dan tag terbaru dari GitHub
git fetch --all --tags

# Pindah ke versi tertentu (misal v4.1.0 atau v4.0.0)
git checkout v4.1.0
```

#### Option 3: Install Via Composer
```bash
# Install versi 4.1.*
composer create-project razenry/zen-php my-app "4.1.*"
```

---

## 🔥 Fitur Terbaru di v4.1.0

1. **API Resource Conditional Attributes & Pagination Wrapper**:
   - Helper `$this->when()`, `$this->whenLoaded()`, `$this->mergeWhen()`.
   - `ApiResource::paginated($paginator)` otomatis membungkus data dengan `links` & `meta`.
2. **Eloquent Relationships (`BelongsToMany` & Eager Loading)**:
   - Relasi Many-to-Many via Pivot Table dengan `BelongsToMany`.
   - Eager Loading `Model::with(['posts', 'comments'])` untuk mencegah masalah *N+1 Query*.
3. **Fluent Collection Methods**:
   - `groupBy()`, `sortBy()`, `sortByDesc()`, `keyBy()`, `flatten()`, `chunk()`, `unique()`, `firstWhere()`.
4. **Multi-Guard Authentication & `HasApiTokens` Trait**:
   - Support `Auth::guard('web')` dan `Auth::guard('api')`.
   - Trait `HasApiTokens` untuk membuat dan memverifikasi token API ala Laravel Sanctum.
5. **Policy Authorization System & `HasAuthorization` Trait**:
   - Pemetaan Policy Class `Gate::policy(Post::class, PostPolicy::class)`.
   - Helper `$user->can('update', $post)` dan `$user->cannot('delete', $post)`.

---

## ⚡ Panduan Ringkas Penggunaan Feature v4.1.0

### 1. API Resource Conditional Attributes
```php
use App\Core\ApiResource;

class UserResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->when(Auth::check(), $this->resource->email),
            'posts' => $this->whenLoaded('posts'),
        ];
    }
}
```

### 2. BelongsToMany & Eager Loading
```php
use App\Models\Role;

class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
}

// Eager Loading mencegah N+1 Query Problem
$users = User::with(['roles'])->get();
```

### 3. Collection Fluent Operations
```php
$collection = collect([
    ['id' => 1, 'category' => 'tech', 'price' => 100],
    ['id' => 2, 'category' => 'tech', 'price' => 200],
]);

$grouped = $collection->groupBy('category');
$sorted  = $collection->sortByDesc('price');
$tech    = $collection->firstWhere('category', 'tech');
```

### 4. Multi-Guard Auth & API Tokens
```php
// Multi-Guard
Auth::guard('api')->check();

// HasApiTokens Trait pada Model User
$token = $user->createToken('mobile-app', ['read', 'write']);
if ($user->tokenCan('write')) {
    // Diizinkan melakukan aksi write
}
```

### 5. Policy Authorization System
```php
// Registrasi Policy
Gate::policy(Post::class, PostPolicy::class);

// Memeriksa Hak Akses via Trait HasAuthorization pada Model User
if ($user->can('update', $post)) {
    // Diizinkan memperbarui postingan
}
```

---

## 🧪 Pengujian Otomatis

Jalankan pengujian unit berbasis Pest PHP:
```bash
php zen test
# atau
vendor/bin/pest
```
