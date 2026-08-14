# 📚 Zen PHP Framework — Official Documentation (v8.0.1 Patch Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, 3 Starter Presets (REST API Dedicated + Swagger UI, React 18 + Vite, & Zen Pulse Live) dengan pembersihan *footprint* otomatis, TailwindCSS Engine Bawaan, Event & Listener Architecture, Blade Component Engine & Directives, Config Caching Optimization, Fluent HTTP Client Engine, Mail & Mailable System, Multi-Channel Notifications, Database Migrations Engine, Schema Builder, Model Factories, Seeder Runner, Zen Pulse Reactive Engine, Multi-Disk File Storage, Cache Engine, Queue Jobs, Gate Authorization, API Resources, serta Pengujian Otomatis Pest PHP.

---

## 📦 Version Switcher Matrix

Zen PHP menggunakan **Git Release Branching System** (seperti Bootstrap) di mana setiap versi utama/patch memiliki branch dan tag terpisah.

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v8.0.1** | **Latest Patch (Recommended)** | `v8.0.1` | `git clone -b v8.0.1 https://github.com/razenry/zen-fr.git` |
| **v8.0.0** | Major Release | `v8.0.0` | `git clone -b v8.0.0 https://github.com/razenry/zen-fr.git` |
| **v7.1.0** | Minor Release | `v7.1.0` | `git clone -b v7.1.0 https://github.com/razenry/zen-fr.git` |
| **v6.0.0** | Major Release | `v6.0.0` | `git clone -b v6.0.0 https://github.com/razenry/zen-fr.git` |
| **v5.0.0** | Major Release | `v5.0.0` | `git clone -b v5.0.0 https://github.com/razenry/zen-fr.git` |
| **v4.1.0** | Patch Release | `v4.1.0` | `git clone -b v4.1.0 https://github.com/razenry/zen-fr.git` |

---

## ⚡ 3 Starter Presets (`php zen preset:<mode>`)

Zen PHP v8.0.1 menyediakan 3 mode starter dengan **auto footprint cleanup**:

### 1. REST API Dedicated (`php zen preset:api`)
- Menghapus UI views overhead untuk meminimalkan ukuran framework.
- **Swagger OpenAPI Documentation UI** interaktif pada rute `/docs`.
- Terintegrasi `CorsMiddleware`, Sanctum-like `HasApiTokens`, `ApiResource`, dan `ApiResponse` trait.

### 2. Fullstack React 18 + Vite (`php zen preset:react`)
- Integrasi React 18 SPA dengan bundler Vite HMR dan TailwindCSS.
- Render komponen React langsung dari controller:
  ```php
  return App::React('Pages/Dashboard', ['user' => $user]);
  ```

### 3. Fullstack Zen Pulse Live (`php zen preset:pulse`)
- Server-side HTML reaktif zero-node dependency dengan live state binding (`zen-model`, `zen-click`).
- Menghapus asset Inertia/React untuk berfokus pada 1 front-end.

---

## 🚀 Fitur & Komponen Utama Framework

### 🛠️ 1. Service & Repository Architecture
Pemisahan tugas yang bersih antara Presentation (Controller), Business Logic (Services), dan Data Access (Repositories):
```php
// Controller -> Service -> Repository
$users = $this->userService->getUsers();
```

### 📡 2. Event & Listener Engine
Sistem event berbasis decoupled architecture:
```php
use App\Core\Event;

Event::listen('user.registered', function ($user) {
    // Send welcome notification
});
Event::dispatch('user.registered', $user);
```

### ✉️ 3. Mail & Multi-Channel Notifications
Pengiriman email & notifikasi multi-channel (Database, Mail):
```php
use App\Core\Mail;

Mail::to('user@example.com')->send(new WelcomeMailable($user));
```

### 🌐 4. Fluent HTTP Client Engine
HTTP Client expressive terinspirasi dari Guzzle/Laravel:
```php
use App\Core\Http;

$response = Http::withToken($token)->get('https://api.example.com/data');
```

### 💾 5. Database Migrations, Schema Builder & Factories
Generator skema database dan mock data generator untuk testing:
```bash
php zen migrate
php zen migrate:refresh
php zen db:seed
```

### ⚡ 6. Queue Jobs & Task Scheduler
Sistem antrean latar belakang dan penjadwalan tugas:
```bash
php zen queue:work
php zen schedule:run
```

### 🛡️ 7. Gate Authorization & Rate Limiting
Sistem otorisasi peran/hak akses dan pembatas rate limit request HTTP.

---

## 🖥️ Panduan Zen CLI Commands

```bash
# Display CLI menu
php zen

# Preset configuration
php zen preset:api
php zen preset:react
php zen preset:pulse

# Code Generators
php zen make:controller ProductController
php zen make:model Product
php zen make:repository ProductRepository
php zen make:service ProductService
php zen make:migration create_products_table
php zen make:pulse Counter
php zen make:test ProductTest

# Optimization & Caching
php zen optimize
php zen config:cache
php zen route:cache
php zen cache:clear

# Testing
php zen test
```

---

## 🧪 Testing with Pest PHP

```bash
php zen test
# atau
vendor/bin/pest
```

---

## 📂 Structure Project

```text
zen-fr/
├── app/
│   ├── controllers/      # Controllers (Slim Controller Layer)
│   ├── core/             # Framework Core (App, Route, Storage, Cache, Events, Mail, Queue, Gate)
│   ├── middleware/       # Middleware (Auth, CORS, RateLimit)
│   ├── models/           # ORM & Database Models
│   ├── pulse/            # Zen Pulse Reactive Components
│   ├── repositories/     # Data Access Layer
│   ├── services/         # Business Logic Layer
│   └── views/            # View Templates & Swagger UI (/docs)
├── database/
│   ├── factories/        # Model Factories
│   ├── migrations/       # Database Migration Scripts
│   └── seeders/          # Database Seeders
├── public/
│   ├── js/zen-pulse.js   # Zen Pulse Engine
│   └── uploads/          # File Storage Mount
├── resources/
│   ├── js/               # React 18 Components & Vite Config
│   └── lang/             # Localizations (ID, EN, JA)
├── routes/
│   ├── api.php           # REST API Routes (/api/v1)
│   └── web.php           # Web Routes & Documentation (/docs)
└── zen                   # Zen CLI Tool
```
