# Catatan Pembaruan & Prosedur Update Versi (v3.3 Release)

Selamat datang di catatan pembaruan resmi **Zen PHP Framework v3.3 Release**. Pembaruan versi ini menghadirkan peningkatan arsitektur ORM dan Query System: Modern Collection Engine, Soft Delete System, serta Laravel-like Relationship Querying System (`whereHas`, `has`, `with`, `doesntHave`).

---

## Patch Notes Summary (v3.3 Release)

<div class="p-3 mb-3 bg-success bg-opacity-10 border border-success rounded-3">
    <h5 class="fw-bold text-success m-0"><i class="bi bi-check-circle-fill me-2"></i> NEW: MAJOR FEATURES (v3.3.0)</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Soft Delete System (v3.3.0)</strong>: Trait <code>App\Core\SoftDeletes</code> untuk penanganan soft deletes dengan metode <code>delete()</code>, <code>forceDelete()</code>, <code>restore()</code>, <code>trashed()</code>, serta query scoping <code>withTrashed()</code>, <code>onlyTrashed()</code>, dan <code>withoutTrashed()</code>.</li>
        <li><strong>Modern Collection Engine (v3.3.0)</strong>: Class <code>App\Core\Collection</code> untuk pengolahan array/model fluent dengan metode <code>map()</code>, <code>filter()</code>, <code>pluck()</code>, <code>where()</code>, <code>whereIn()</code>, <code>onlyTrashed()</code>, <code>toArray()</code>, dan <code>toJson()</code>.</li>
        <li><strong>Laravel-like Relationship Querying (v3.3.0)</strong>: Dukungan chaining query relasi <code>$user->posts()->where(...)</code>, Eager Loading <code>User::with('posts')</code>, serta query keberadaan relasi <code>whereHas()</code>, <code>has()</code>, <code>doesntHave()</code>, dan <code>whereDoesntHave()</code>.</li>
        <li><strong>Migration Blueprint Soft Delete</strong>: Metode <code>$table->softDeletes()</code> pada `Database\Blueprint` untuk kemudahan migrasi database.</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-primary bg-opacity-10 border border-primary rounded-3">
    <h5 class="fw-bold text-primary m-0"><i class="bi bi-lightning-charge-fill me-2"></i> BUFF: PERFORMANCE & TEST SUITE</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Perluasan Pengujian Otomatis Pest PHP</strong>: 25 unit & feature test suite (80 assertion) lulus 100% dengan performa eksekusi ultra-cepat (1.17s).</li>
        <li><strong>Subquery EXISTS Performance</strong>: Optimasi pembentukan query `WHERE EXISTS` pada relasi database untuk pengolahan data besar.</li>
    </ul>
</div>

---

## Prosedur Cara Update Versi Framework (Ke v3.3.0)

Jika Anda sudah menginstal paket `razenry/zen-php` sebelumnya via Composer, ikuti prosedur pembaruan versi berikut untuk memperbarui proyek ke versi **v3.3.0** secara aman:

### Langkah 1: Perbarui Paket via Composer
Buka terminal proyek Anda dan jalankan:

```bash
composer update razenry/zen-php
```

### Langkah 2: Bersihkan Cache Temporary
Membersihkan buffer temporary dan cache sesi lama:

```bash
php zen clear
```

### Langkah 3: Jalankan Migrasi Skema Database
Memastikan skema tabel database terbaru telah dibuat:

```bash
php zen migrate
```

### Langkah 4: Jalankan Test Suite Pest PHP
Memastikan seluruh pengujian otomatis lulus:

```bash
php zen test
```

### Langkah 5: Optimalkan Performa Framework
Mengonfigurasi dan mengoptimalkan autoloading untuk kecepatan maksimal:

```bash
php zen optimize
```

Proyek Zen PHP Framework Anda telah berhasil diperbarui ke versi v3.3.0 Release.
