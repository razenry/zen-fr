# Zen CLI (Command Line Interface)

Zen PHP dilengkapi dengan alat command-line bawaan yang dinamis dan efisien yang dinamakan Zen CLI. Alat ini membantu mempercepat produktivitas pengembang solo maupun tim.

---

## Menjalankan Perintah Zen

Untuk melihat daftar semua perintah yang tersedia, jalankan perintah ini di terminal root proyek:

```bash
php zen
```

---

## Setup Clean Project (`zen setup`)

Perintah `zen setup` digunakan untuk mengonfigurasi direktori dasar dan menyiapkan lingkungan kerja yang bersih siap pakai:

```bash
php zen setup
```

Perintah ini akan:
- Membuat berkas `.env` dari `.env.example` (jika belum ada).
- Menyiapkan struktur direktori `app/repositories`, `app/services`, `app/pulse`, `app/views/pulse`, `public/uploads`, `tests/Unit`, dan `tests/Feature`.
- Memastikan instalasi siap digunakan untuk proyek baru.

---

## Generator Perintah (Scaffolding)

### Membuat Repository
```bash
php zen make:repository UserRepository
```
*Menghasilkan `app/repositories/UserRepository.php`.*

### Membuat Service
```bash
php zen make:service UserService
```
*Menghasilkan `app/services/UserService.php`.*

### Membuat Komponen Zen Pulse Reaktif
```bash
php zen make:pulse Counter
```
*Menghasilkan `app/pulse/Counter.php` dan `app/views/pulse/counter.php`.*

### Membuat Controller
```bash
php zen make:controller UserController
```
*Menghasilkan `app/controllers/UserController.php`.*

### Membuat Model
```bash
php zen make:model User
```
*Menghasilkan `app/models/User.php`.*

### Membuat File Migrasi
```bash
php zen make:migration create_users_table
```
*Menghasilkan berkas migrasi di `database/migrations/`.*

### Membuat File Test (Pest PHP)
```bash
php zen make:test UserServiceTest
```
*Menghasilkan berkas pengujian di `tests/Unit/UserServiceTest.php`.*

---

## Menjalankan Test Suite

```bash
php zen test
```

---

## Manajemen Migrasi Database

```bash
# Menjalankan migrasi database
php zen migrate

# Reset tabel dan jalankan ulang semua migrasi
php zen migrate:refresh
```
