# Testing (Pest PHP & PHPUnit)

Zen PHP Framework mendukung pengujian otomatis modern secara bawaan (*Automated Testing*) menggunakan **Pest PHP** dan **PHPUnit**. Arsitektur Service & Repository yang modular membuat pengujian logika bisnis aplikasi menjadi sangat mudah dan cepat.

---

## 1. Menjalankan Test Suite

Untuk menjalankan seluruh pengujian otomatis pada aplikasi Anda, gunakan perintah Zen CLI:

```bash
php zen test
```

---

## 2. Membuat File Test Baru

Gunakan generator Zen CLI untuk membuat file pengujian Pest PHP baru:

```bash
php zen make:test UserServiceTest
```

Perintah di atas akan menghasilkan file pengujian baru di `tests/Unit/UserServiceTest.php`.

---

## 3. Struktur Pengujian

```text
tests/
├── Feature/          # Integration & Route Tests
│   └── ExampleTest.php
├── Unit/             # Service & Repository Unit Tests
│   └── UserServiceTest.php
├── Pest.php          # Konfigurasi Pest PHP & Custom Expectations
└── TestCase.php      # Base TestCase Class
```

---

## 4. Contoh Pengujian Service & Repository

### Pengujian Unit Service (`tests/Unit/UserServiceTest.php`)

```php
use App\Services\UserService;
use App\Repositories\UserRepository;

test('validasi registrasi mengembalikan error jika input kosong', function () {
    $userService = new UserService();
    $result = $userService->registerUser([
        'name' => '',
        'email' => '',
        'password' => ''
    ]);

    expect($result)->toBeArray();
    expect($result['status'])->toBeFalse();
    expect($result['message'])->toBe('Semua field wajib diisi.');
});

test('otentikasi mengembalikan error jika email tidak ditemukan', function () {
    $userService = new UserService();
    $result = $userService->authenticate('nonexistent@example.com', 'password123');

    expect($result['status'])->toBeFalse();
    expect($result['message'])->toBe('Email atau password salah.');
});
```

### Pengujian Reaktif Zen Pulse (`tests/Feature/ExampleTest.php`)

```php
test('komponen reaktif zen pulse dapat mengubah state', function () {
    $counter = new App\Pulse\Counter();
    $counter->increment(5);

    expect($counter->count)->toBe(5);
});
```

---

## 5. Keuntungan Bagi Solo & Team Developer

- **Keandalan Tinggi**: Memastikan setiap fitur baru yang dibuat tidak merusak (*break*) fungsi yang sudah ada.
- **Refaktorisasi Aman**: Pengembang dapat mengubah struktur kode dengan percaya diri selama pengujian otomatis tetap hijau (pass).
- **Integrasi CI/CD**: Pengujian dapat dijalankan secara otomatis di GitHub Actions atau pipeline CI/CD lainnya.
