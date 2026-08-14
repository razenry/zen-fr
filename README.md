# Zen PHP Framework (v6.0.0 Major Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, Fluent HTTP Client Engine, Mail & Mailable System, Multi-Channel Notifications, Database Migrations Engine, Schema Builder, Model Factories, Seeder Runner, Zen Pulse Reactive Engine, Multi-Disk File Storage, Cache Engine, Queue Jobs, Gate Authorization, API Resources, serta Pengujian Otomatis Pest PHP.

---

## 📦 Pilihan Versi & Cara Download (Version Switcher Matrix)

Zen PHP menggunakan **Git Release Branching System** (seperti Bootstrap) di mana setiap versi utama/patch memiliki branch dan tag terpisah.

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v6.0.0** | **Latest Major (Recommended)** | `v6.0.0` | `git clone -b v6.0.0 https://github.com/razenry/zen-fr.git` |
| **v5.0.0** | Major Release | `v5.0.0` | `git clone -b v5.0.0 https://github.com/razenry/zen-fr.git` |
| **v4.1.0** | Patch Release | `v4.1.0` | `git clone -b v4.1.0 https://github.com/razenry/zen-fr.git` |
| **v4.0.0** | Release Stable | `v4.0.0` | `git clone -b v4.0.0 https://github.com/razenry/zen-fr.git` |
| **v3.4.0** | Stable Release | `v3.4.0` | `git clone -b v3.4.0 https://github.com/razenry/zen-fr.git` |

### 🚀 Cara Install & Switch Versi

```bash
# Clone versi terbaru v6.0.0
git clone -b v6.0.0 https://github.com/razenry/zen-fr.git my-project

# Atau switch versi pada repo lokal
git fetch --all --tags
git checkout v6.0.0

# Install via Composer
composer create-project razenry/zen-php my-app "6.0.*"
```

---

## 🔥 Fitur Utama Terbaru di v6.0.0 (Communication & Integration Suite Major)

1. **Fluent HTTP Client Engine (`Http`)**:
   - Client HTTP intuitif berbasis cURL: `Http::get()`, `Http::post()`, `Http::put()`, `Http::delete()`, `Http::withHeaders()`, `Http::withToken()`, `Http::timeout()`.
   - Inspeksi response: `$response->successful()`, `$response->failed()`, `$response->json()`, `$response->body()`.
   - Test Faking Support: `Http::fake()` untuk pengujian unit tanpa request internet sungguhan.
2. **Mail Engine & Mailable Classes (`Mail`)**:
   - Base class `Mailable` dengan dukungan template view HTML dan subject.
   - Syntax pengiriman email: `Mail::to($user)->send(new WelcomeMail($user))`.
   - Test Faking Support: `Mail::fake()` & `Mail::assertSent()`.
3. **Multi-Channel Notification System (`Notification`)**:
   - Base class `Notification` & Trait `Notifiable` untuk mengirim notifikasi multi-channel (`mail`, `database`, `webhook`).
   - Call syntax: `$user->notify(new OrderPaidNotification($order))`.
4. **Perkakas Zen CLI Baru**:
   - `php zen make:mail WelcomeMail`
   - `php zen make:notification OrderPaidNotification`

---

## ⚡ Contoh Penggunaan Fitur v6.0.0

### 1. Fluent HTTP Client Engine
```php
use App\Core\Http;

// Request GET dengan Token Authorization
$response = Http::withToken('SECRET_TOKEN')
    ->get('https://api.github.com/user');

if ($response->successful()) {
    $userData = $response->json();
}

// Testing / Unit Test Faking
Http::fake([
    'api.xendit.co/*' => ['status' => 'PAID', 'amount' => 150000],
]);
$res = Http::post('https://api.xendit.co/v2/invoices', ['amount' => 150000]);
```

### 2. Mail & Mailable Classes
```php
use App\Core\Mail;
use App\Mail\WelcomeMail;

// Pengiriman Email ke User
Mail::to('user@example.com')->send(new WelcomeMail($user));

// Unit Testing Email (Zero Side Effect)
Mail::fake();
// ... Aksi aplikasi yang mengabaikan pengiriman fisik email
Mail::assertSent(WelcomeMail::class);
```

### 3. Multi-Channel Notifications
```php
use App\Core\Notifiable;
use App\Core\Notification;

class User extends Model
{
    use Notifiable;
}

class InvoiceNotification extends Notification
{
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }
}

// Mengirimkan Notifikasi
$user->notify(new InvoiceNotification($invoice));
```

---

## 🧪 Pengujian Otomatis

Jalankan pengujian unit berbasis Pest PHP:
```bash
php zen test
# atau
vendor/bin/pest
```
