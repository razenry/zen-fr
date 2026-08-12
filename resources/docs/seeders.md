# Database Seeders

Fitur **Database Seeder** pada Zen PHP Framework memungkinkan pengembang untuk mengisi tabel database dengan data sampel, data tes, atau data awal produksi secara otomatis dan terstruktur.

---

## 1. Membuat Seeder Baru

Gunakan perkakas Zen CLI untuk membuat kelas seeder baru:

```bash
php zen make:seeder ProductSeeder
```

Perintah ini akan membuat berkas `database/seeders/ProductSeeder.php`.

---

## 2. Struktur Kelas Seeder

Setiap seeder mewarisi kelas `Database\Seeder` dan mengimplementasikan metode `run()`:

```php
namespace Database\Seeders;

use Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Bersihkan data lama jika diperlukan
        $this->db->query("TRUNCATE TABLE products");
        $this->db->execute();

        // Data sampel produk
        $products = [
            [
                'name' => 'Zen Cloud Server',
                'price' => 1250000,
                'description' => 'Server cloud performa tinggi.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Pulse Pro License',
                'price' => 450000,
                'description' => 'Lisensi toolkit komponen reaktif.',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($products as $p) {
            $this->db->query("INSERT INTO products (name, price, description, created_at) VALUES (:name, :price, :description, :created_at)");
            $this->db->bind(':name', $p['name']);
            $this->db->bind(':price', $p['price']);
            $this->db->bind(':description', $p['description']);
            $this->db->bind(':created_at', $p['created_at']);
            $this->db->execute();
        }
    }
}
```

---

## 3. Memanggil Seeder di Master Class (`DatabaseSeeder.php`)

Daftarkan seeder individual ke dalam `database/seeders/DatabaseSeeder.php` menggunakan metode `$this->call()`:

```php
namespace Database\Seeders;

use Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        echo "Seeding Users...\n";
        $this->call(UserSeeder::class);

        echo "Seeding Products...\n";
        $this->call(ProductSeeder::class);
    }
}
```

---

## 4. Menjalankan Seeder via CLI

Jalankan perintah berikut pada terminal proyek Anda:

```bash
# Menjalankan Master DatabaseSeeder
php zen db:seed

# Menjalankan Seeder spesifik
php zen db:seed ProductSeeder
```
