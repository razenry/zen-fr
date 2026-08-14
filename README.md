# Zen PHP Framework (v4.0.0 Major Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, Zen Pulse Reactive Engine, Multi-Disk File Storage System, Cache Engine, Queue Jobs, Gate Authorization, serta Pengujian Otomatis Pest PHP.

---

## Fitur Utama & Modul v4.0

1. **Service & Repository Pattern Standard**: Pemisahan tegas antara Controller, Logika Bisnis (Services), dan Akses Data (Repositories) untuk skala solo maupun tim.
2. **Enhanced Multi-Disk File Storage System**: Abstraksi penyimpanan terpadu (`public`, `local`, `s3`/cloud) dengan fitur Temporary Signed URLs, Streaming Download, dan Upload Helper fluen (`$request->file('avatar')->store('avatars', 's3')`).
3. **Cache Engine**: Caching tingkat tinggi berbasis file & memory (`Cache::remember()`, `Cache::put()`, `Cache::flush()`, `php zen cache:clear`).
4. **Queue & Background Jobs**: Penanganan tugas latar belakang secara asinkron (`ProcessJob::dispatch()`, `php zen make:job`, `php zen queue:work`).
5. **Authorization (Gates & Policies)**: Sistem keamanan dan hak akses berbasis peran & kebijakan (`Gate::define()`, `Gate::allows()`, `php zen make:policy`).
6. **Task Scheduling & Rate Limiting**: Penjadwalan task terpusat (`php zen schedule:run`) dan pembatasan request API (`RateLimitMiddleware`).
7. **Zen Pulse Reactive Engine**: Komponen reaktif zero-dependency untuk mengikat state dan action (`zen-model`, `zen-click`, `zen-submit`, `zen-poll`) tanpa javascript eksternal yang rumit.
8. **ORM Casts & Mutators**: Pembacaan otomatis tipe data (`json`, `array`, `boolean`, `datetime`) serta method Accessor (`get...Attribute`) & Mutator (`set...Attribute`).
9. **Pest PHP Testing Integration**: Dukungan pengujian otomatis terintegrasi via `php zen test` dan `php zen make:test`.
10. **Interactive Zen CLI Tool**: Perkakas CLI berwarna untuk setup, migrasi database, clearing cache, queue worker, dan generator scaffolding lengkap.

---

## Persyaratan Sistem & Instalasi

- **PHP** 8.0+ (PHP 8.3 / 8.4 kompatibel)
- **MySQL / MariaDB**
- **Composer**

### Instalasi via Composer (Rekomendasi)

```bash
composer create-project razenry/zen-php my-app
cd my-app
php zen setup
```

---

## Panduan Fitur Utama

### 💾 1. Enhanced File Storage
```php
use App\Core\Storage;

// Simpan & Ambil File dari Disk Public atau Private/S3
Storage::disk('public')->put('documents/report.pdf', $content);
$fileContent = Storage::disk('s3')->get('documents/report.pdf');

// Generate Temporary Signed URL (Valid selama 30 menit)
$tempUrl = Storage::disk('private')->temporaryUrl('private-doc.pdf', 1800);

// Fluent Upload di Controller via Request
$path = $request->file('avatar')->store('avatars', 'public');
$path = $request->file('document')->storeAs('docs', 'invoice.pdf', 's3');
```

### ⚡ 2. Cache Engine
```php
use App\Core\Cache;

// Simpan atau Ambil dari Cache
$users = Cache::remember('all_users', 3600, function() {
    return UserRepository::all();
});

// Cache Clearing via CLI
// php zen cache:clear
```

### ⚙️ 3. Queue Jobs & Dispatching
```php
use App\Jobs\ProcessOrderJob;

// Dispatch Job ke Queue
ProcessOrderJob::dispatch($orderId);

// Jalankan Worker melalui Terminal CLI
// php zen queue:work
```

### 🛡️ 4. Gate Authorization
```php
use App\Core\Gate;

Gate::define('update-product', function ($user, $product) {
    return $user->id === $product->user_id;
});

if (Gate::allows('update-product', $currentUser, $product)) {
    // Diizinkan memperbarui produk
}
```

---

## Penggunaan Zen CLI

```bash
# Menampilkan semua perintah
php zen

# Setup proyek bersih & clear cache
php zen setup
php zen cache:clear

# Jalankan pengujian otomatis (Pest PHP)
php zen test

# Background Workers & Task Scheduler
php zen queue:work
php zen schedule:run

# Database Migrations & Seeders
php zen migrate
php zen migrate:refresh
php zen db:seed

# Generators (Scaffolding)
php zen make:repository UserRepository
php zen make:service UserService
php zen make:job ProcessPodcastJob
php zen make:policy UserPolicy
php zen make:pulse Counter
php zen make:test UserServiceTest
php zen make:controller ProductController
php zen make:model Product
php zen make:migration create_products_table
```

---

## Struktur Direktori Project

```text
zen-fr/
├── app/
│   ├── controllers/      # Controller Layer (Slim Controllers)
│   ├── core/             # Core Engine (Storage, Cache, Queue, Gate, Route, Model)
│   ├── helpers/          # Helper Functions (DateHelper, TextHelper)
│   ├── jobs/             # Queue Background Jobs
│   ├── middleware/       # HTTP Middleware (Auth, RateLimit)
│   ├── models/           # ORM & Database Models
│   ├── policies/         # Authorization Policies
│   ├── pulse/            # Zen Pulse Reactive Components
│   ├── repositories/     # Data Access Layer (Repository Pattern)
│   ├── services/         # Business Logic Layer (Service Pattern)
│   └── views/            # View Templates, Layouts & Components
├── database/
│   └── migrations/       # File Skrip Migrasi Database
├── public/
│   ├── js/zen-pulse.js   # Engine JS Zen Pulse
│   └── uploads/          # Folder Upload Media Disk Public
├── resources/
│   └── lang/             # Lokalisasi i18n (ID, EN, JA)
├── routes/
│   └── web.php           # Pendefinisian Route Aplikasi
├── storage/
│   └── app/              # Storage Disk Private & Local Files
├── tests/                # Test Suite Pest PHP & PHPUnit
│   ├── Feature/          # Feature / Integration Tests
│   └── Unit/             # Unit Tests
├── .env                  # Konfigurasi Environment & Database
└── zen                   # Interactive CLI Executable
```

---

## Struktur Branch Repository

- **`main`** (Branch Saat Ini): **Clean Framework Starter v4.0.0**. Siap digunakan langsung untuk membangun aplikasi baru tanpa perlu menghapus file/konfigurasi dokumentasi.
- **`docs`**: **Documentation & Reference Site**. Berisi seluruh file markdown dokumentasi beserta engine pembaca dokumentasi internal di rute `/docs`.

### Mengakses Dokumentasi Lokal
Jika Anda ingin menjalankan situs dokumentasi interaktif secara lokal:

```bash
git checkout docs
php -S localhost:8000
```
Lalu buka `http://localhost:8000/docs` di browser Anda.


