# Zen PHP Framework (v8.1.0 Minor Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, 3 Starter Presets (REST API Dedicated + Swagger UI, React 18 + Vite, & Zen Pulse Live) dengan pembersihan *footprint* otomatis, Built-in Development Server (`php zen serve`), TailwindCSS Engine Bawaan, Event & Listener Architecture, Blade Component Engine & Directives, Config Caching Optimization, Fluent HTTP Client Engine, Mail & Mailable System, Multi-Channel Notifications, Database Migrations Engine, Schema Builder, Model Factories, Seeder Runner, Zen Pulse Reactive Engine, Multi-Disk File Storage, Cache Engine, Queue Jobs, Gate Authorization, API Resources, serta Pengujian Otomatis Pest PHP.

---

## 📦 Pilihan Versi & Cara Download (Version Switcher Matrix)

Zen PHP menggunakan **Git Release Branching System** (seperti Bootstrap) di mana setiap versi utama/patch memiliki branch dan tag terpisah.

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v8.1.0** | **Latest Minor (Recommended)** | `v8.1.0` | `git clone -b v8.1.0 https://github.com/razenry/zen-fr.git` |
| **v8.0.0** | Major Release | `v8.0.0` | `git clone -b v8.0.0 https://github.com/razenry/zen-fr.git` |
| **v7.1.0** | Minor Release | `v7.1.0` | `git clone -b v7.1.0 https://github.com/razenry/zen-fr.git` |
| **v6.0.0** | Major Release | `v6.0.0` | `git clone -b v6.0.0 https://github.com/razenry/zen-fr.git` |
| **v5.0.0** | Major Release | `v5.0.0` | `git clone -b v5.0.0 https://github.com/razenry/zen-fr.git` |
| **v4.1.0** | Patch Release | `v4.1.0` | `git clone -b v4.1.0 https://github.com/razenry/zen-fr.git` |

### 🚀 Cara Install & Switch Versi

```bash
# Clone versi terbaru v8.1.0
git clone -b v8.1.0 https://github.com/razenry/zen-fr.git my-project

# Atau switch versi pada repo lokal
git fetch --all --tags
git checkout v8.1.0

# Install via Composer
composer create-project razenry/zen-php my-app
```

---

## ⚡ 3 Starter Presets Framework (`php zen preset:<mode>`)

Zen PHP v8.1.0 menyediakan 3 mode siap pakai dengan **pembersihan footprint otomatis** sesuai kebutuhan arsitektur aplikasi Anda:

### 1. REST API Dedicated (`php zen preset:api`)
- Mode murni Backend REST API tanpa view HTML overhead (otomatis membersihkan file UI/React yang tidak terpakai).
- Terintegrasi Dokumentasi **Swagger UI** OpenAPI pada rute `/docs`.
- Dilengkapi `CorsMiddleware`, `TokenAuth` (Sanctum-like API Tokens), `ApiResource`, dan `ApiResponse` trait.

### 2. Fullstack React 18 + Vite (`php zen preset:react`)
- Integrasi React 18 SPA/Hybrid dengan bundler Vite HMR dan TailwindCSS (otomatis membersihkan komponen Blade Pulse).
- Render komponen React langsung dari controller Zen PHP:
  ```php
  return App::React('Pages/Dashboard', ['user' => $user]);
  ```

### 3. Fullstack Zen Pulse Live (`php zen preset:pulse`)
- Server-side rendering HTML reaktif tanpa perlu install Node.js atau bundler eksternal (otomatis menghapus file React/Inertia untuk fokus pada 1 front-end).
- Dilengkapi TailwindCSS Engine & live reactive state binding (`zen-model`, `zen-click`).

---

## 🚀 Development Server (`php zen serve`)

Jalankan local PHP development server (gaya Laravel `php artisan serve`):

```bash
# Jalankan server lokal default (http://127.0.0.1:8000)
php zen serve

# Atau via composer script
composer run dev
# atau
composer run serve

# Kustomisasi host dan port
php zen serve --host=localhost --port=8080
```

---

## 🎨 Integrasi Bawaan TailwindCSS & React Vite

TailwindCSS & Vite HMR dikonfigurasi secara default (`tailwind.config.js`, `postcss.config.js`, `resources/css/app.css`):
- **Vite Dev Server (React HMR)**: `npm run dev`
- **Vite Production Build**: `npm run build`
- **Zero-Config CDN Fallback**: Terintegrasi otomatis via `App::Vite()`

---

## 🧪 Pengujian Otomatis

Jalankan pengujian unit berbasis Pest PHP:
```bash
php zen test
# atau
vendor/bin/pest
```
