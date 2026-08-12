# Zen PHP Framework

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, Zen Pulse Reactive Engine, Real-Time SSE Streaming, serta Pengujian Otomatis Pest PHP.

---

## Fitur Utama

1. **Service & Repository Pattern Standard**: Pemisahan tegas antara Controller, Logika Bisnis (Services), dan Akses Data (Repositories) untuk skala solo maupun tim.
2. **Zen Pulse Reactive Engine**: Komponen reaktif zero-dependency untuk mengikat state dan action (`zen-model`, `zen-click`, `zen-submit`, `zen-poll`) tanpa javascript eksternal yang rumit.
3. **Real-time SSE (Server-Sent Events)**: Streaming data dari server ke browser secara instan di `/_zen/sse`.
4. **Pest PHP Testing Integration**: Dukungan pengujian otomatis (*unit & feature testing*) terintegrasi via `php zen test` dan `php zen make:test`.
5. **Interactive Zen CLI Tool**: Alat baris perintah berwarna untuk setup otomatis (`zen setup`), migrasi database, dan generator (`make:repository`, `make:service`, `make:pulse`, `make:test`, `make:controller`, `make:model`, `make:migration`).
6. **Expressive Laravel-like Routing**: Pengaturan rute dinamis dengan named routes, middleware sederhana, dan error handling terpusat.
7. **Reusable UI Components**: Sistem komponen UI yang bersih (`App::Component()`) untuk membangun tampilan modular secara fleksibel.

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

## Penggunaan Zen CLI

```bash
# Menampilkan semua perintah
php zen

# Setup proyek bersih
php zen setup

# Jalankan pengujian otomatis (Pest PHP)
php zen test

# Jalankan / refresh migrasi database
php zen migrate
php zen migrate:refresh

# Generators (Scaffolding)
php zen make:repository UserRepository
php zen make:service UserService
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
│   ├── core/             # Core Engine (App, Route, Model, ZenPulseComponent)
│   ├── helpers/          # Helper Functions (DateHelper, TextHelper)
│   ├── models/           # ORM & Database Models
│   ├── pulse/            # Zen Pulse Reactive Components
│   ├── repositories/     # Data Access Layer (Repository Pattern)
│   ├── services/         # Business Logic Layer (Service Pattern)
│   └── views/            # View Templates, Layouts & Components
├── database/
│   └── migrations/       # File Skrip Migrasi Database
├── public/
│   ├── js/zen-pulse.js   # Engine JS Zen Pulse
│   └── uploads/          # Folder Upload Media
├── resources/
│   └── docs/             # Dokumentasi Resmi Zen PHP (Markdown)
├── routes/
│   └── web.php           # Pendefinisian Route Aplikasi
├── tests/                # Test Suite Pest PHP & PHPUnit
│   ├── Feature/          # Feature / Integration Tests
│   └── Unit/             # Unit Tests
├── .env                  # Konfigurasi Environment & Database
└── zen                   # Interactive CLI Executable
```

---

## Dokumentasi

Dokumentasi lengkap termasuk Tutorial CRUD Relasi, UI Components, dan Pest PHP Testing dapat diakses secara langsung melalui aplikasi pada rute `/docs` setelah server dinyalakan:

```bash
php -S localhost:8000
```

Kunjungi `http://localhost:8000/docs` di browser Anda!
