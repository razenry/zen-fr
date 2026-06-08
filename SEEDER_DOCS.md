# Seeder System Documentation

Sistem seeder digunakan untuk mempopulasi (mengisi) database Anda dengan data awal atau data *dummy* secara otomatis. Sistem ini dibangun dengan arsitektur yang terinspirasi dari framework Laravel dan kompatibel dengan fitur-fitur yang sudah ada pada framework Zen PHP.

## Struktur Direktori

Sistem Seeder terdiri dari komponen berikut:
- `database/Seeder.php` : Abstract class yang menjadi *parent* (kelas dasar) untuk seluruh seeder.
- `database/seeders/` : Folder tempat seluruh file seeder diletakkan.
- `database/seeders/DatabaseSeeder.php` : Seeder utama yang akan dijalankan secara *default*.

## Command Line Interface (CLI)

Sistem Seeder dapat dijalankan menggunakan CLI `zen` yang ada pada direktori root proyek.

### 1. Membuat Seeder Baru

Untuk membuat file seeder baru, gunakan perintah berikut:

```bash
php zen make:seeder NamaSeeder
```

**Contoh:**
```bash
php zen make:seeder UserSeeder
```

Perintah di atas akan men-generate sebuah file baru `database/seeders/UserSeeder.php` dengan struktur template dasar.

### 2. Menjalankan Seeder

Anda dapat mengeksekusi seeder menggunakan perintah `db:seed`.

**Menjalankan Seeder Default (`DatabaseSeeder`):**
```bash
php zen db:seed
```

**Menjalankan Seeder Spesifik:**
Anda juga dapat menentukan class seeder spesifik mana yang ingin dijalankan dengan menambahkan nama class-nya.
```bash
php zen db:seed UserSeeder
```

## Cara Menulis Seeder

Setelah file seeder di-generate menggunakan `make:seeder`, Anda bisa menambahkan logika pengisian tabel di dalam method `run()`. Anda bisa memanfaatkan instance dari koneksi database atau model Anda.

**Contoh `database/seeders/UserSeeder.php`:**
```php
<?php

namespace Database\Seeders;

use Database\Seeder;
use Database\Database;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = new Database();
        
        $db->table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => password_hash('password', PASSWORD_DEFAULT)
        ]);

        echo "User data inserted!\n";
    }
}
```

### Memanggil Seeder Lain (Nesting)

Pada `DatabaseSeeder` utama, Anda dapat memanggil seeder-seeder spesifik untuk mengelompokkan dan merapikan pemanggilan seeder, menggunakan method `$this->call()`.

**Contoh `database/seeders/DatabaseSeeder.php`:**
```php
<?php

namespace Database\Seeders;

use Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Memanggil seeder lainnya
        $this->call('UserSeeder');
        $this->call('RoleSeeder');
    }
}
```
