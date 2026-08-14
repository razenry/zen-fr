<?php

return [
    // Global Navigation
    'home' => 'Beranda',
    'about' => 'Tentang',
    'docs' => 'Dokumentasi',
    'login' => 'Masuk',
    'register' => 'Daftar',
    'logout' => 'Keluar',
    'footer_rights' => 'Hak Cipta Dilindungi.',

    // Hero Section
    'hero_title' => 'Zen PHP Framework',
    'hero_subtitle' => 'Framework PHP modern ultra-ringan, cepat, dan tangguh bersaing di era sekarang. Dirancang khusus untuk pengembang solo maupun tim yang membutuhkan arsitektur terstruktur, reaktif, dan siap pakai untuk produksi enterprise.',
    'btn_docs' => 'Buka Dokumentasi',
    'btn_demo' => 'Coba Demo Interaktif',

    // Patch Notes & Upgrade Badges (Professional Format)
    'badge_patch' => 'PATCH NOTES v4.0 MAJOR RELEASE',
    'badge_buff' => 'BUFF: PERFORMANCE & MULTI-DISK STORAGE',
    'badge_nerf' => 'NERF: CODEBASE PURGE & DEPRECATION',
    'badge_adjust' => 'ADJUSTMENT: SYSTEM REFACTORING',
    'badge_new' => 'NEW: MAJOR ENTERPRISE FEATURES',
    'patch_title' => 'Catatan Pembaruan v4.0 Enterprise Major Release',
    'patch_subtitle' => 'Ringkasan fitur utama baru: Enhanced Multi-Disk Storage System, Cache Engine, Queue Jobs, Gate Authorization, Task Scheduling, dan Rate Limiter.',
    'upgrade_proc_title' => 'Prosedur Update Versi via Composer',
    'upgrade_proc_desc' => 'Jalankan perintah berikut pada terminal proyek Anda untuk memperbarui ke versi terbaru:',

    // Stats Card Labels
    'stat_speed' => 'Kecepatan Pest Test Suite',
    'stat_pattern' => 'Service & Repository Pattern',
    'stat_realtime' => 'Zen Pulse & SSE Realtime',
    'stat_api' => 'Enterprise API Engine',

    // Showcase Tabs & Sections
    'showcase_title' => 'Live Interactive Framework Showcase',
    'showcase_subtitle' => 'Uji coba langsung seluruh fitur utama Zen PHP Framework secara real-time di bawah ini.',
    'tab_pulse' => 'Zen Pulse Reactive',
    'tab_api' => 'RESTful API Tester',
    'tab_storage' => 'Multi-Disk Storage',
    'tab_cache_queue' => 'Cache & Queue Jobs',
    'tab_gate' => 'Gate & Security',
    'tab_arch' => 'Service & Repository',
    'tab_cli' => 'Zen CLI & Seeders',
    'tab_patch' => 'Patch Notes & Upgrade',

    // Zen Pulse Demo Section
    'pulse_embedded_title' => 'Live Embedded Component',
    'pulse_embedded_desc' => 'Komponen reaktif di bawah ini berjalan menggunakan Zen Pulse Engine (zero-dependency). Interaksi zen-click dan zen-model memperbarui DOM secara otomatis via AJAX tanpa reload halaman.',
    'pulse_sse_title' => 'Real-time SSE Monitor',
    'pulse_sse_desc' => 'Zen PHP memiliki handler Server-Sent Events di /_zen/sse untuk streaming event server ke browser secara instan.',
    'pulse_sse_listening' => 'Mendengarkan stream /_zen/sse...',
    'pulse_info' => 'Tidak membutuhkan Node.js, Pusher, atau Redis. Murni PHP dan vanilla JS modern.',

    // Counter Component Strings
    'counter_title' => 'Zen Pulse Reactive Counter',
    'counter_label_input' => 'Nama Anda (Live Data Binding):',
    'counter_placeholder' => 'Ketik nama Anda di sini...',
    'counter_greeting' => 'Halo',
    'counter_current_val' => 'Nilai counter saat ini:',
    'btn_decrement' => '-1 Kurangi',
    'btn_reset' => 'Reset',
    'btn_increment' => '+1 Tambah',
    'btn_rocket' => '+5 Rocket',

    // RESTful API Tester Strings
    'api_tester_title' => 'RESTful API Interactive Tester',
    'api_tester_desc' => 'Uji coba endpoint RESTful API terintegrasi yang menggunakan ApiResponse, ApiResource DTO, dan Validator.',
    'api_ping_label' => 'Cek status kesehatan API',
    'api_products_label' => 'Ambil produk via ApiResource DTO',
    'api_val_err_label' => 'Test error 422 Validator otomatis',
    'api_output_title' => 'API Response Output',
    'api_awaiting' => 'Menunggu Request...',
    'api_prompt' => 'Klik tombol di atas untuk mengirim HTTP Request langsung ke backend Zen PHP...',

    // Service & Repository Section Strings
    'arch_title' => 'Katalog Produk (Service & Repository Pattern)',
    'arch_desc' => 'Seluruh data produk di bawah ini diambil menggunakan ProductService dan ProductRepository tanpa query database langsung di Controller.',
    'arch_empty' => 'Data produk sampel siap dikelola menggunakan ProductService dan ProductRepository. Jalankan `php zen db:seed` untuk mengisi data.',
    'arch_processed' => 'Diproses melalui Service & Repository Layer.',

    // CLI & Testing Section Strings
    'cli_title' => 'Zen CLI, Database Seeder & Pest Testing',
    'cli_desc' => 'Perintah baris perintah (CLI) untuk mempercepat alur kerja pengembangan solo maupun tim.',
    'cli_comment_setup' => '// Setup Proyek Baru & Workspace',
    'cli_comment_seeder' => '// Populasikan Database dengan Seeder',
    'cli_comment_test' => '// Jalankan Pest Test Suite (0.21s)',
    'cli_comment_scaffold' => '// Generator Scaffolding Lengkap',

    // About Page Strings
    'about_title' => 'Tentang Zen PHP Framework',
    'about_badge' => 'Pembuat Framework & Arsitektur',
    'about_lead' => 'Di balik kesederhanaan dan kecepatan Zen PHP Framework terdapat visi kuat untuk menghadirkan Developer Experience (DX) terbaik bagi pengembang aplikasi modern.',
    'about_creator_label' => 'Pembuat & Pengembang Utama',
    'about_creator_name' => 'Razenry',
    'about_creator_title' => 'Software Architect & Open Source Contributor',
    'about_creator_bio' => 'Razenry merancang Zen PHP Framework untuk memberikan Developer Experience (DX) terbaik bagi pengembang solo maupun tim.',
    'about_history_title' => 'Sejarah & Filosofi Terciptanya Zen PHP',
    'about_history_body' => 'Zen PHP tercipta dari keinginan untuk memadukan keunggulan dari beberapa framework populer dunia (seperti kepraktisan MVC ala Laravel, komponen reaktif tanpa Node.js ala Livewire, serta perlapisan Service & Repository Pattern yang rapi untuk skala enterprise). Kerangka kerja ini dibangun secara murni agar sangat ringan, super cepat, tanpa kelebihan dependensi yang tidak perlu.',
    'about_blend_title' => 'Perpaduan Konsep Terbaik:',
    'about_laravel_title' => 'Laravel-like MVC & Routing',
    'about_laravel_desc' => 'Kemudahan perutean deklaratif Route::get() dan struktur Controller yang familiar.',
    'about_livewire_title' => 'Livewire-style Reaktif',
    'about_livewire_desc' => 'Komponen reaktif Zen Pulse dengan zen-model dan zen-click tanpa ketergantungan Node.js.',
    'about_pattern_title' => 'Service & Repository Pattern',
    'about_pattern_desc' => 'Arsitektur terstruktur standar enterprise untuk memisahkan logika bisnis dan akses data.',
    'about_pest_title' => 'Pest Testing & CLI Seeder',
    'about_pest_desc' => 'Dukungan pengujian otomatis Pest PHP dan perkakas CLI php zen db:seed yang interaktif.',

    // Language Labels
    'lang_id' => 'Bahasa Indonesia',
    'lang_en' => 'English',
    'lang_ja' => 'Japanese'
];
