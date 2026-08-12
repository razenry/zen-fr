# Catatan Pembaruan & Prosedur Update Versi (v2.0 Release)

Selamat datang di catatan pembaruan resmi **Zen PHP Framework v2.0 Enterprise Release**. Pembaruan versi ini merangkum peningkatan performa (BUFF), pembersihan kode legacy (NERF), penyesuaian sistem (ADJUSTMENT), serta kehadiran fitur utama baru (NEW MAJOR FEATURES).

---

## Patch Notes Summary (v2.0 Release)

<div class="p-3 mb-3 bg-success bg-opacity-10 border border-success rounded-3">
    <h5 class="fw-bold text-success m-0"><i class="bi bi-check-circle-fill me-2"></i> NEW: MAJOR FEATURES RELEASE</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Database Seeder Engine (<code>php zen db:seed</code>)</strong>: Fitur pengisian data sampel dan master data ke database MySQL secara otomatis dan terstruktur via CLI.</li>
        <li><strong>Enterprise Service & Repository Pattern</strong>: Arsitektur terstandarisasi untuk memisahkan bisnis logik dan akses data secara bersih.</li>
        <li><strong>Triple Language Engine (i18n)</strong>: Pengalih bahasa terpadu mendukung Bahasa Indonesia, English, dan Japanese pada aplikasi dan dokumentasi.</li>
        <li><strong>Perintah CLI <code>zen clear</code> & <code>zen optimize</code></strong>: Utilitas pembersihan cache temporary dan optimasi autoloading produksi.</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-primary bg-opacity-10 border border-primary rounded-3">
    <h5 class="fw-bold text-primary m-0"><i class="bi bi-lightning-charge-fill me-2"></i> BUFF: PERFORMANCE ENHANCEMENTS</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Eksekusi Test Suite Pest PHP (0.21s)</strong>: Peningkatan kecepatan pengujian unit dan integrasi hingga 0.21 detik.</li>
        <li><strong>Reaktivitas Zen Pulse (Zero-Dependency)</strong>: Peningkatan responsivitas <code>zen-click</code> dan <code>zen-model</code> tanpa butuh Node.js / Pusher.</li>
        <li><strong>Otomatisasi Subfolder <code>baseUrl</code></strong>: Deteksi URL dinamis otomatis untuk hosting Laragon/Apache subfolder.</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-danger bg-opacity-10 border border-danger rounded-3">
    <h5 class="fw-bold text-danger m-0"><i class="bi bi-x-circle-fill me-2"></i> NERF: CODEBASE PURGE & DEPRECATION</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Pembersihan Monolitik Legacy</strong>: Menghapus total controller, model, dan views post monolitik lama untuk memangkas ukuran codebase.</li>
        <li><strong>Pembersihan Dependensi Berat</strong>: Menghapus pustaka yang tidak terpakai sehingga framework menjadi sangat ringan (ultra-lightweight).</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-warning bg-opacity-10 border border-warning rounded-3">
    <h5 class="fw-bold text-dark m-0"><i class="bi bi-sliders me-2"></i> ADJUSTMENT: SYSTEM REFACTORING</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Unifikasi Navbar Layout Header</strong>: Tampilan header dan dropdown pengalih bahasa di dokumentasi dan beranda 100% seragam.</li>
        <li><strong>Focus Retention Live Input</strong>: Posisi kursor dan fokus input tidak hilang saat mengetik pada komponen reaktif.</li>
    </ul>
</div>

---

## Prosedur Cara Update Versi Framework

Jika Anda sudah menginstal paket `razenry/zen-php` sebelumnya via Composer, ikuti prosedur pembaruan versi berikut untuk memperbarui proyek ke versi terbaru secara aman:

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

### Langkah 4: Populasikan Data Terbaru via Seeder
Mengisi data master dan data sampel awal:

```bash
php zen db:seed
```

### Langkah 5: Optimalkan Performa Framework
Mengonfigurasi dan mengoptimalkan autoloading untuk kecepatan maksimal:

```bash
php zen optimize
```

Proyek Zen PHP Framework Anda telah berhasil diperbarui ke versi v2.0 Enterprise Release.
