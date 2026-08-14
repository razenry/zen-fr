# Zen PHP Framework (v7.0.0 Major Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, Event & Listener Architecture, Blade Component Engine & Directives, Config Caching Optimization, Fluent HTTP Client Engine, Mail & Mailable System, Multi-Channel Notifications, Database Migrations Engine, Schema Builder, Model Factories, Seeder Runner, Zen Pulse Reactive Engine, Multi-Disk File Storage, Cache Engine, Queue Jobs, Gate Authorization, API Resources, serta Pengujian Otomatis Pest PHP.

---

## 📦 Pilihan Versi & Cara Download (Version Switcher Matrix)

Zen PHP menggunakan **Git Release Branching System** (seperti Bootstrap) di mana setiap versi utama/patch memiliki branch dan tag terpisah.

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v7.0.0** | **Latest Major (Recommended)** | `v7.0.0` | `git clone -b v7.0.0 https://github.com/razenry/zen-fr.git` |
| **v6.0.0** | Major Release | `v6.0.0` | `git clone -b v6.0.0 https://github.com/razenry/zen-fr.git` |
| **v5.0.0** | Major Release | `v5.0.0` | `git clone -b v5.0.0 https://github.com/razenry/zen-fr.git` |
| **v4.1.0** | Patch Release | `v4.1.0` | `git clone -b v4.1.0 https://github.com/razenry/zen-fr.git` |
| **v4.0.0** | Release Stable | `v4.0.0` | `git clone -b v4.0.0 https://github.com/razenry/zen-fr.git` |

### 🚀 Cara Install & Switch Versi

```bash
# Clone versi terbaru v7.0.0
git clone -b v7.0.0 https://github.com/razenry/zen-fr.git my-project

# Atau switch versi pada repo lokal
git fetch --all --tags
git checkout v7.0.0

# Install via Composer
composer create-project razenry/zen-php my-app "7.0.*"
```

---

## 🔥 Fitur Utama Terbaru di v7.0.0 (Event Architecture, Blade Components & Framework Optimization Major)

1. **Event & Listener System (`Event`)**:
   - Arsitektur event terdekopel: `Event::listen()`, `Event::dispatch()`.
   - Test Faking & Assertions: `Event::fake()` & `Event::assertDispatched()`.
   - Command CLI: `php zen make:event OrderProcessed`, `php zen make:listener SendInvoiceListener`.
2. **Blade Component Engine & Directives (`ViewComponent`)**:
   - Base class `ViewComponent` untuk merender komponen UI reaktif.
   - Directive parser: `@auth`, `@guest`, `@can('ability', $params)`, `@cannot('ability', $params)`.
   - Command CLI: `php zen make:component Alert`.
3. **Framework Optimization & Config Caching Engine**:
   - Kompilasi konfigurasi menjadi array cached `storage/framework/config.php` untuk booting instan.
   - Command CLI: `php zen config:cache`, `php zen config:clear`, `php zen optimize`.

---

## ⚡ Contoh Penggunaan Fitur v7.0.0

### 1. Event & Listener Architecture
```php
use App\Core\Event;
use App\Events\OrderProcessed;

// Registrasi Listener
Event::listen(OrderProcessed::class, function ($event) {
    // Logika pemrosesan setelah order selesai
});

// Trigger Event
Event::dispatch(new OrderProcessed($order));

// Unit Testing Event
Event::fake();
// ... Aksi yang memicu event
Event::assertDispatched(OrderProcessed::class);
```

### 2. View Component & Template Directives
```php
use App\Core\ViewComponent;

class AlertComponent extends ViewComponent
{
    public function render(): string
    {
        return '<div class="alert alert-info">' . htmlspecialchars($this->data['title']) . '</div>';
    }
}

// Evaluasi Directive pada Template
$html = ViewComponent::evaluateDirectives("
    @auth Selamat datang Kembali! @endauth
    @can('edit-post', \$post) <button>Edit Post</button> @endcan
");
```

### 3. Framework Optimization & Caching
```bash
# Kompilasi cache konfigurasi untuk kecepatan booting tertinggi
php zen config:cache

# Hapus cache konfigurasi
php zen config:clear

# Optimasi penuh framework (Config + Route Caching)
php zen optimize
```

---

## 🧪 Pengujian Otomatis

Jalankan pengujian unit berbasis Pest PHP:
```bash
php zen test
# atau
vendor/bin/pest
```
