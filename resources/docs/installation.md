# Instalasi & Memulai Zen PHP

Selamat datang di dokumentasi resmi Zen PHP Framework. Framework ini dirancang ultra-ringan, sangat cepat, dan tangguh bersaing di era modern dengan dukungan Service-Repository Pattern, Zen Pulse Reactive Engine, dan Real-time SSE.

---

## Persyaratan Sistem

- PHP >= 8.0 (PHP 8.3 / 8.4 didukung penuh)
- Ekstensi PDO PHP & Mbstring
- Composer
- Database MySQL / MariaDB

---

## Cara Menginstal via Composer (Rekomendasi)

Cara tercepat untuk menginstal Zen PHP adalah dengan menggunakan Composer `create-project`:

```bash
composer create-project razenry/zen-php my-app
cd my-app
```

---

## Cara Alternatif (Git Clone)

Anda juga dapat melakukan clone langsung dari repositori Git:

```bash
git clone https://github.com/razenry/zen-framework.git my-app
cd my-app
composer install
```

---

## Inisialisasi Otomatis via Zen Setup

Setelah proyek dibuat, jalankan perintah otomatis Zen Setup:

```bash
php zen setup
```

Perintah `zen setup` akan:
- Membuat berkas `.env` dari `.env.example` (jika belum ada).
- Menyiapkan struktur direktori `app/repositories`, `app/services`, `app/pulse`, `app/views/pulse`, dan `public/uploads`.
- Menyiapkan proyek untuk langsung digunakan.

---

## Konfigurasi Environment (`.env`)

Buka berkas `.env` dan sesuaikan pengaturan koneksi database Anda:

```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zen_db
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi database bawaan:
```bash
php zen migrate
```

---

## Menjalankan Server Development

```bash
php -S localhost:8000
```
Buka browser di `http://localhost:8000` untuk mengakses aplikasi Zen PHP Anda.
