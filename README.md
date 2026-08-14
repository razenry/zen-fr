# Zen PHP Framework (v5.0.0 Major Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan kesederhanaan arsitektur MVC dengan keandalan Service & Repository Pattern, Database Migrations Engine, Schema Builder, Model Factories, Seeder Runner, Zen Pulse Reactive Engine, Multi-Disk File Storage, Cache Engine, Queue Jobs, Gate Authorization, API Resources, serta Pengujian Otomatis Pest PHP.

---

## 📦 Pilihan Versi & Cara Download (Version Switcher Matrix)

Zen PHP menggunakan **Git Release Branching System** (seperti Bootstrap) di mana setiap versi utama/patch memiliki branch dan tag terpisah.

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v5.0.0** | **Latest Major (Recommended)** | `v5.0.0` | `git clone -b v5.0.0 https://github.com/razenry/zen-fr.git` |
| **v4.1.0** | Patch Release | `v4.1.0` | `git clone -b v4.1.0 https://github.com/razenry/zen-fr.git` |
| **v4.0.0** | Release Stable | `v4.0.0` | `git clone -b v4.0.0 https://github.com/razenry/zen-fr.git` |
| **v3.4.0** | Stable Release | `v3.4.0` | `git clone -b v3.4.0 https://github.com/razenry/zen-fr.git` |
| **v3.0.0** | Legacy Release | `v3.0.0` | `git clone -b v3.0.0 https://github.com/razenry/zen-fr.git` |

### 🚀 Cara Install & Switch Versi

```bash
# Clone versi terbaru v5.0.0
git clone -b v5.0.0 https://github.com/razenry/zen-fr.git my-project

# Atau switch versi pada repo lokal
git fetch --all --tags
git checkout v5.0.0

# Install via Composer
composer create-project razenry/zen-php my-app "5.0.*"
```

---

## 🔥 Fitur Utama Terbaru di v5.0.0 (Database & Migration Engine Major)

1. **Database Migrations & Schema Builder Engine**:
   - Migration Runner terstruktur dengan tabel pelacak `migrations` (`batch`, `executed_at`).
   - Fluent Schema Builder: `Schema::create()`, `Schema::table()`, `Schema::dropIfExists()`.
   - Command CLI: `php zen make:migration`, `php zen migrate`, `php zen migrate:rollback`, `php zen migrate:reset`, `php zen migrate:status`.
2. **Model Factories & Database Seeding Engine**:
   - Base class `Factory` dengan method `make()`, `create()`, `count()`, dan generator data palsu bawaan (`fakeName`, `fakeEmail`, `fakeText`, `fakeNumber`, `fakeDate`).
   - Command CLI: `php zen make:factory`, `php zen make:seeder`, `php zen db:seed`.
3. **Database Transactions & Query Profiler**:
   - `Database::transaction(callable $callback)` dengan komit/rollback otomatis.
   - Logging kueri SQL: `Database::enableQueryLog()`, `Database::getQueryLog()`.

---

## ⚡ Contoh Penggunaan Fitur v5.0.0

### 1. Database Migrations & Schema Builder
```php
use Database\Schema;
use Database\Blueprint;

class CreateUsersTable
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

```bash
# Jalankan migrasi basis data
php zen migrate

# Cek status migrasi
php zen migrate:status

# Rollback batch migrasi terakhir
php zen migrate:rollback
```

### 2. Model Factories & Database Seeder
```php
namespace Database\Factories;

use App\Core\Factory;
use App\Models\User;

class UserFactory extends Factory
{
    protected string $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->fakeName(),
            'email' => $this->fakeEmail(),
            'created_at' => $this->fakeDate(),
        ];
    }
}

// Penggunaan di Seeder atau Unit Test:
UserFactory::new()->count(20)->create();
```

```bash
# Jalankan seeder basis data
php zen db:seed
```

### 3. Database Transactions
```php
use Database\Database;

Database::transaction(function ($db) {
    // Kueri 1 & Kueri 2 diproses dalam 1 transaksi atomik
    $db->query("UPDATE accounts SET balance = balance - 100 WHERE id = 1")->execute();
    $db->query("UPDATE accounts SET balance = balance + 100 WHERE id = 2")->execute();
});
```

---

## 🧪 Pengujian Otomatis

Jalankan pengujian unit berbasis Pest PHP:
```bash
php zen test
# atau
vendor/bin/pest
```
