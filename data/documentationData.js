export const uiTranslations = {
  id: {
    docsTitle: 'Dokumentasi Resmi Zen PHP',
    docsSubtitle: 'Framework PHP Super Cepat & Modern dengan React 18, Zen Pulse, & REST API Mode',
    searchPlaceholder: 'Cari topik dokumentasi, fitur, atau kode (Ctrl + K)...',
    searchTitle: 'Pencarian Dokumentasi',
    searchNoResults: 'Tidak ada hasil ditemukan untuk',
    onThisPage: 'Di Halaman Ini',
    previousPage: 'Halaman Sebelumnya',
    nextPage: 'Halaman Selanjutnya',
    quickStart: 'Mulai Sekarang',
    reactGuide: 'Panduan React Inertia',
    quickInstall: 'Instalasi Cepat via Composer',
    versionBadge: 'Rilis Utama v9.1.6',
    githubRepo: 'GitHub Repositori',
    selectLanguage: 'Pilih Bahasa',
    copyCode: 'Salin Kode',
    copied: 'Tersalin!',
    menuTitle: 'Menu Utama Dokumentasi',
    presetReactTitle: 'Fullstack React 18 + Vite',
    presetReactDesc: 'Integrasi SPA modern dengan Inertia.js, React 18, Vite HMR, dan TailwindCSS v4.',
    presetPulseTitle: 'Zen Pulse Live Reactive Engine',
    presetPulseDesc: 'Komponen Blade reaktif tanpa bundler JS eksternal secara real-time.',
    presetApiTitle: 'Enterprise Dedicated REST API',
    presetApiDesc: 'Back-end API terstandar dengan Swagger UI di /docs dan format JSON Envelope.',
  },
  en: {
    docsTitle: 'Zen PHP Official Documentation',
    docsSubtitle: 'Ultra-Fast & Modern PHP Framework with React 18, Zen Pulse, & REST API Mode',
    searchPlaceholder: 'Search documentation topics, features, or code (Ctrl + K)...',
    searchTitle: 'Documentation Search',
    searchNoResults: 'No results found for',
    onThisPage: 'On This Page',
    previousPage: 'Previous Page',
    nextPage: 'Next Page',
    quickStart: 'Get Started',
    reactGuide: 'React Inertia Guide',
    quickInstall: 'Quick Installation via Composer',
    versionBadge: 'Major Release v9.1.6',
    githubRepo: 'GitHub Repository',
    selectLanguage: 'Select Language',
    copyCode: 'Copy Code',
    copied: 'Copied!',
    menuTitle: 'Documentation Menu',
    presetReactTitle: 'Fullstack React 18 + Vite',
    presetReactDesc: 'Modern SPA integration with Inertia.js, React 18, Vite HMR, and TailwindCSS v4.',
    presetPulseTitle: 'Zen Pulse Live Reactive Engine',
    presetPulseDesc: 'Real-time server-driven reactive Blade components with zero external JS bundler.',
    presetApiTitle: 'Enterprise Dedicated REST API',
    presetApiDesc: 'Standardized API backend with Swagger OpenAPI UI at /docs and JSON Envelopes.',
  },
  ja: {
    docsTitle: 'Zen PHP 公式ドキュメント',
    docsSubtitle: 'React 18、Zen Pulse、REST API モードを備えた超高速でモダンな PHP フレームワーク',
    searchPlaceholder: 'トピック、機能、またはコードを検索 (Ctrl + K)...',
    searchTitle: 'ドキュメント検索',
    searchNoResults: '該当する結果が見つかりません:',
    onThisPage: 'このページの内容',
    previousPage: '前のページ',
    nextPage: '次のページ',
    quickStart: '今すぐ始める',
    reactGuide: 'React Inertia ガイド',
    quickInstall: 'Composer でのクイックインストール',
    versionBadge: 'メジャーリリース v9.1.6',
    githubRepo: 'GitHub リポジトリ',
    selectLanguage: '言語を選択',
    copyCode: 'コードをコピー',
    copied: 'コピーしました！',
    menuTitle: 'ドキュメントメニュー',
    presetReactTitle: 'フルスタック React 18 + Vite',
    presetReactDesc: 'Inertia.js、React 18、Vite HMR、TailwindCSS v4 を備えたモダンな SPA 統合。',
    presetPulseTitle: 'Zen Pulse ライブリアクティブエンジン',
    presetPulseDesc: '外部 JS バンドラーなしでリアルタイムに動作するサーバー駆動型 Blade コンポーネント。',
    presetApiTitle: 'エンタープライズ専用 REST API',
    presetApiDesc: '/docs で Swagger UI を備えた標準化された API バックエンド。',
  },
  zh: {
    docsTitle: 'Zen PHP 官方文档',
    docsSubtitle: '集成了 React 18、Zen Pulse 和 REST API 模式的高速现代 PHP 框架',
    searchPlaceholder: '搜索文档主题、功能或代码 (Ctrl + K)...',
    searchTitle: '文档搜索',
    searchNoResults: '未找到相关结果：',
    onThisPage: '本页目录',
    previousPage: '上一页',
    nextPage: '下一页',
    quickStart: '快速开始',
    reactGuide: 'React Inertia 指南',
    quickInstall: '通过 Composer 快速安装',
    versionBadge: '主要版本 v9.1.6',
    githubRepo: 'GitHub 代码库',
    selectLanguage: '选择语言',
    copyCode: '复制代码',
    copied: '已复制！',
    menuTitle: '文档菜单',
    presetReactTitle: '全栈 React 18 + Vite',
    presetReactDesc: '结合 Inertia.js、React 18、Vite HMR 和 TailwindCSS v4 的现代单页应用集成。',
    presetPulseTitle: 'Zen Pulse 实时响应式引擎',
    presetPulseDesc: '无需外部 JS 打包工具的实时服务端驱动 Blade 组件。',
    presetApiTitle: '企业级专用 REST API',
    presetApiDesc: '标准化 API 后端，在 /docs 提供 Swagger UI 及 JSON 响应结构。',
  }
};

export const docsNavigation = [
  {
    slug: 'getting-started',
    icon: 'Rocket',
    title: {
      id: 'Getting Started & Setup',
      en: 'Getting Started & Setup',
      ja: 'はじめに & セットアップ',
      zh: '入门指南与安装设置'
    },
    description: {
      id: 'Persyaratan sistem, cara instalasi, dev server gabungan, dan siklus hidup framework (lifecycle).',
      en: 'System requirements, installation, concurrent dev server, and framework lifecycle.',
      ja: 'システム要件、インストール、並行開発サーバー、フレームワークのライフサイクル。',
      zh: '系统要求、安装步骤、并行开发服务器及框架生命周期。'
    }
  },
  {
    slug: 'core-architecture',
    icon: 'Cpu',
    title: {
      id: 'Core Architecture & Helpers',
      en: 'Core Architecture & Helpers',
      ja: 'コアアーキテクチャ & ヘルパー',
      zh: '核心架构与辅助函数'
    },
    description: {
      id: 'Struktur MVC, Service-Repository Pattern, Dependency Injection, dan global helper functions.',
      en: 'MVC structure, Service-Repository pattern, Dependency Injection, and global helper functions.',
      ja: 'MVC構造、サービスリポジトリパターン、依存性注入、グローバルヘルパー関数。',
      zh: 'MVC 结构、服务-存储库模式、依赖注入及全局辅助函数。'
    }
  },
  {
    slug: 'routing-middleware',
    icon: 'GitBranch',
    title: {
      id: 'Routing & Middleware Engine',
      en: 'Routing & Middleware Engine',
      ja: 'ルーティング & ミドルウェアエンジン',
      zh: '路由与中间件引擎'
    },
    description: {
      id: 'Definisi route web & API, parameter dinamis, named routes, route caching, CORS, & Auth Middleware.',
      en: 'Web & API routes, dynamic parameters, named routes, route caching, CORS, & Auth Middleware.',
      ja: 'WebおよびAPIルート、動的パラメータ、ルートキャッシュ、CORSおよび認証ミドルウェア。',
      zh: 'Web 与 API 路由、动态参数、命名路由、路由缓存、CORS 及身份验证中间件。'
    }
  },
  {
    slug: 'controllers-services',
    icon: 'Layers',
    title: {
      id: 'Controllers, Services & Repositories',
      en: 'Controllers, Services & Repositories',
      ja: 'コントローラー、サービス & リポジトリ',
      zh: '控制器、服务与存储库'
    },
    description: {
      id: 'Clean architecture controller, service business logic, repository ORM, dan validasi input.',
      en: 'Clean architecture controllers, service business logic, repository ORM, and input validation.',
      ja: 'クリーンアーキテクチャ、サービスビジネスロジック、リポジトリ ORM、および入力検証。',
      zh: '整洁架构控制器、服务业务逻辑、存储库 ORM 及输入验证。'
    }
  },
  {
    slug: 'react-preset',
    icon: 'Atom',
    title: {
      id: 'React 18 & Inertia.js SPA (+ Full CRUD App)',
      en: 'React 18 & Inertia.js SPA (+ Full CRUD App)',
      ja: 'React 18 & Inertia.js SPA (+ フル CRUD)',
      zh: 'React 18 & Inertia.js 单页应用 (+ 完整 CRUD)'
    },
    description: {
      id: 'Tutorial lengkap pembuatan Single Page Application (SPA) React 18 dan contoh CRUD Produk.',
      en: 'Complete tutorial for React 18 Single Page Application (SPA) and Product CRUD App.',
      ja: 'React 18 SPA と製品 CRUD アプリの完全チュートリアル。',
      zh: 'React 18 单页应用与产品 CRUD 应用的完整教程。'
    }
  },
  {
    slug: 'pulse-preset',
    icon: 'Zap',
    title: {
      id: 'Zen Pulse Live Engine (+ Full CRUD App)',
      en: 'Zen Pulse Live Engine (+ Full CRUD App)',
      ja: 'Zen Pulse ライブリアクティブ (+ フル CRUD)',
      zh: 'Zen Pulse 实时响应式引擎 (+ 完整 CRUD)'
    },
    description: {
      id: 'Komponen Blade reaktif real-time tanpa JS bundler dan contoh aplikasi CRUD Task Live.',
      en: 'Real-time reactive Blade components without JS bundlers and Task Live CRUD tutorial.',
      ja: 'JS バンドラーなしのリアルタイム Blade コンポーネントと Task Live CRUD ガイド。',
      zh: '无需 JS 打包工具的实时 Blade 组件及 Task Live CRUD 教程。'
    }
  },
  {
    slug: 'api-preset',
    icon: 'Server',
    title: {
      id: 'Dedicated REST API & Swagger (+ Full CRUD)',
      en: 'Dedicated REST API & Swagger (+ Full CRUD)',
      ja: '専用 REST API & Swagger (+ フル CRUD)',
      zh: '专用 REST API 与 Swagger (+ 完整 CRUD)'
    },
    description: {
      id: 'Mode Dedicated REST API, Standard Enterprise JSON Envelopes, Swagger UI, & CRUD API.',
      en: 'Dedicated REST API Mode, Enterprise JSON Envelopes, Swagger UI, & CRUD API tutorial.',
      ja: '専用 REST API モード、エンタープライズ JSON レスポンス、Swagger UI、CRUD API。',
      zh: '专用 REST API 模式、企业级 JSON 响应结构、Swagger UI 及 CRUD API。'
    }
  },
  {
    slug: 'authorization',
    icon: 'ShieldCheck',
    title: {
      id: 'Authorization & Security Engine',
      en: 'Authorization & Security Engine',
      ja: '認可 & セキュリティエンジン',
      zh: '授权与安全引擎'
    },
    description: {
      id: 'Sistem Gate & Policy authorization tingkat enterprise, helper authorize(), dan Blade directives.',
      en: 'Enterprise Gate & Policy authorization engine, authorize() helper, and Blade directives.',
      ja: 'エンタープライズ認可エンジン、authorize() ヘルパー、Blade ディレクティブ。',
      zh: '企业级 Gate 与 Policy 授权引擎、authorize() 辅助函数及 Blade 指令。'
    }
  },
  {
    slug: 'cli-commands',
    icon: 'Terminal',
    title: {
      id: 'Zen CLI Artisan Tool Commands',
      en: 'Zen CLI Artisan Tool Commands',
      ja: 'Zen CLI Artisan ツールコマンド',
      zh: 'Zen CLI Artisan 工具命令'
    },
    description: {
      id: 'Daftar lengkap perintah php zen untuk generator make:*, migrasi, seeders, dan optimasi.',
      en: 'Complete reference of php zen commands for generators make:*, migrations, seeders, and optimization.',
      ja: 'make:* ジェネレーター、マイグレーション、最適化のための php zen コマンド一覧。',
      zh: '用于 make:* 生成器、迁移和优化的 php zen 命令完整参考。'
    }
  },
  {
    slug: 'testing',
    icon: 'CheckCircle',
    title: {
      id: 'Testing Engine with Pest PHP',
      en: 'Testing Engine with Pest PHP',
      ja: 'Pest PHP テストエンジン',
      zh: 'Pest PHP 测试引擎'
    },
    description: {
      id: 'Pengujian otomatis unit & feature test menggunakan sintaks modern Pest PHP.',
      en: 'Automated unit & feature testing using modern Pest PHP syntax.',
      ja: 'モダンな Pest PHP 構文を使用した自動ユニット & 機能テスト。',
      zh: '使用现代 Pest PHP 语法的自动化单元与功能测试。'
    }
  },
  {
    slug: 'ai-agents',
    icon: 'Bot',
    title: {
      id: 'AI Assistant Handbook',
      en: 'AI Assistant Handbook',
      ja: 'AI アシスタントハンドブック',
      zh: 'AI 助手开发手册'
    },
    description: {
      id: 'Pedoman standar arsitektur dan instruksi kerja untuk AI pair programmer (AGENTS.md).',
      en: 'Standard architectural guidelines and prompts for AI pair programming (AGENTS.md).',
      ja: 'AI ペアプログラミングのための標準アーキテクチャガイドライン (AGENTS.md)。',
      zh: '针对 AI 结对编程的标准架构指南与操作规范 (AGENTS.md)。'
    }
  }
];

export const docsDetailContent = {
  'getting-started': {
    id: {
      title: 'Getting Started & Framework Lifecycle (v9.1.6)',
      subtitle: 'Panduan penginstalan lengkap, penjelasan siklus hidup (lifecycle) request, struktur folder, dan pengoperasian dev server gabungan Zen PHP Framework.',
      sections: [
        {
          id: 'framework-lifecycle',
          heading: '1. Siklus Hidup Request (Framework Lifecycle)',
          text: 'Memahami bagaimana Zen PHP Framework memproses request dari awal hingga mengembalikan response ke browser:',
          items: [
            '1. Front Controller (public/index.php): Menjadi pintu masuk utama untuk seluruh HTTP request.',
            '2. Framework Bootstrap (app/init.php): Memuat Composer Autoloader PSR-4, menguji file .env, dan mengaktifkan error handler.',
            '3. Route Dispatcher (App\\Core\\Route): Memeriksa URL & method request, mencocokkan dengan rute di routes/web.php atau routes/api.php.',
            '4. Middleware Pipeline: Menjalankan eksekusi middleware (Auth, CORS, Security, RateLimit) sebelum mencapai controller.',
            '5. Controller & Service Injection: Memanggil method controller yang sesuai dan mengeksekusi logika bisnis di Service Layer.',
            '6. Response Hydration: Mengembalikan hasil dalam bentuk Blade View (HTML), React Component (Inertia SPA), atau Standard JSON API Envelope.'
          ],
          code: `// Alur Singkat Request Lifecycle:\nBrowser Request -> public/index.php -> app/init.php -> Middleware -> Route -> Controller -> Service -> Repository -> Database -> Response`,
          language: 'text'
        },
        {
          id: 'system-requirements',
          heading: '2. Persyaratan Sistem',
          text: 'Zen PHP Framework v9.1.6 dirancang ultra-ringan dan kompatibel dengan lingkungan PHP modern:',
          items: [
            'PHP versi ^8.0 atau lebih baru',
            'Composer versi ^2.0',
            'Node.js ^18.0 (Opsional, dibutuhkan untuk preset React 18 & Vite HMR)',
            'Database: MySQL, PostgreSQL, SQLite, atau MariaDB'
          ],
          code: `php -v\ncomposer --version\nnode -v`,
          language: 'bash'
        },
        {
          id: 'installation',
          heading: '3. Cara Instalasi Framework',
          text: 'Anda dapat menginstal Zen PHP melalui Composer Create-Project atau melakukan Git Clone ke rilis spesifik:',
          code: `# Opsi 1: Instalasi via Composer (Direkomendasikan)\ncomposer create-project razenry/zen-php my-app\ncd my-app\n\n# Opsi 2: Git Clone rilis v9.1.6\ngit clone -b v9.1.6 https://github.com/razenry/zen-fr.git my-app\ncd my-app\ncomposer install`,
          language: 'bash'
        },
        {
          id: 'dev-server',
          heading: '4. Menjalankan Concurrent Dev Server',
          text: 'Zen PHP dilengkapi Built-in Concurrent Dev Server yang secara simultan menyalakan PHP HTTP server (port 8000) dan Vite HMR server (port 5173):',
          code: `# Jalankan PHP Dev Server + Vite HMR secara bersamaan\ncomposer run dev\n# Atau via Zen CLI\nphp zen dev\n\n# Atau jalankan PHP Server saja (port 8000)\nphp zen serve`,
          language: 'bash'
        }
      ]
    },
    en: {
      title: 'Getting Started & Framework Lifecycle (v9.1.6)',
      subtitle: 'Complete installation guide, request lifecycle explanation, folder structure, and operating the concurrent development server.',
      sections: [
        {
          id: 'framework-lifecycle',
          heading: '1. Request Lifecycle',
          text: 'Understanding how Zen PHP Framework processes incoming requests from start to finish:',
          items: [
            '1. Front Controller (public/index.php): Single entry point for all incoming HTTP requests.',
            '2. Framework Bootstrap (app/init.php): Loads PSR-4 autoloader, environment variables, and error handlers.',
            '3. Route Dispatcher (App\\Core\\Route): Matches request URL and method against registered web or API routes.',
            '4. Middleware Pipeline: Executes Auth, CORS, and Security middlewares prior to reaching the controller.',
            '5. Controller & Service Injection: Dispatches controller methods and executes business logic in the Service Layer.',
            '6. Response Hydration: Returns rendered HTML Blade Views, React Inertia components, or Standard JSON Envelopes.'
          ],
          code: `Browser Request -> public/index.php -> app/init.php -> Middleware -> Route -> Controller -> Service -> Repository -> Database -> Response`,
          language: 'text'
        }
      ]
    },
    ja: {
      title: 'はじめに & フレームワークのライフサイクル',
      subtitle: 'Zen PHP Framework の完全なインストール、リクエストライフサイクル、ディレクトリスイッチ手順。',
      sections: [
        {
          id: 'framework-lifecycle',
          heading: '1. リクエストライフサイクル',
          text: 'Zen PHP がリクエストを処理する完全なフロー:',
          code: `Request -> public/index.php -> app/init.php -> Middleware -> Route -> Controller -> Service -> Response`,
          language: 'text'
        }
      ]
    },
    zh: {
      title: '入门指南与框架生命周期',
      subtitle: 'Zen PHP 框架的完整安装指南、请求生命周期说明、目录结构及开发服务器操作。',
      sections: [
        {
          id: 'framework-lifecycle',
          heading: '1. 请求生命周期 (Request Lifecycle)',
          text: 'Zen PHP 框架处理每一个 HTTP 请求的完整过程：',
          code: `Request -> public/index.php -> app/init.php -> Middleware -> Route -> Controller -> Service -> Response`,
          language: 'text'
        }
      ]
    }
  },

  'core-architecture': {
    id: {
      title: 'Core Architecture & Global Helpers',
      subtitle: 'Memahami arsitektur MVC, Service-Repository Pattern, Dependency Injection, dan daftar fungsi helper global pada Zen PHP Framework.',
      sections: [
        {
          id: 'mvc-service-repository',
          heading: '1. Pola Arsitektur Enterprise (Service & Repository Pattern)',
          text: 'Zen PHP memisahkan tanggung jawab kode menjadi 3 layer utama:',
          items: [
            'Controller: Menangani HTTP request, validasi input, dan mengembalikan response (HTML / React / JSON).',
            'Service Layer: Tempat penulisan logika bisnis (business logic) utama aplikasi.',
            'Repository Layer: Mengisolasi query ke database / ORM sehingga logika data terpisah dari bisnis.'
          ],
          code: `// Contoh Alur Kerja Clean Architecture:\n// Controller -> Service -> Repository -> Model -> Database`,
          language: 'php'
        },
        {
          id: 'global-helpers',
          heading: '2. Daftar Helper Functions Global',
          text: 'Zen PHP menyediakan helper global siap pakai tanpa perlu mengimpor kelas:',
          code: `// 1. Mengembalikan Blade View\nreturn view('home.index', ['title' => 'Dashboard']);\n\n// 2. Mengembalikan React Inertia Component\nreturn react('Pages/UserList', ['users' => $users]);\n// atau\nreturn inertia('Pages/UserList', ['users' => $users]);\n\n// 3. Mengembalikan Enterprise JSON API Envelope\nreturn response()->json($data, 200, 'Berhasil diambil');\n\n// 4. Otorisasi Gate & Security\ngate()->define('admin-only', fn($user) => $user['role'] === 'admin');\nauthorize('admin-only');`,
          language: 'php'
        }
      ]
    },
    en: {
      title: 'Core Architecture & Global Helpers',
      subtitle: 'Understanding MVC, Service-Repository pattern, Dependency Injection, and global helper functions in Zen PHP Framework.',
      sections: [
        {
          id: 'mvc-service-repository',
          heading: '1. Enterprise Architecture Pattern (Service & Repository)',
          text: 'Zen PHP separates code responsibilities into 3 distinct layers:',
          items: [
            'Controller: Handles HTTP requests, input validation, and returns responses.',
            'Service Layer: Contains application core business logic.',
            'Repository Layer: Isolates database queries and ORM operations.'
          ],
          code: `// Application Flow:\n// Controller -> Service -> Repository -> Model -> Database`,
          language: 'php'
        }
      ]
    },
    ja: {
      title: 'コアアーキテクチャ & グローバルヘルパー',
      subtitle: 'Zen PHP における MVC と Service-Repository パターンの解説。',
      sections: [
        {
          id: 'mvc-service-repository',
          heading: '1. アーキテクチャの役割',
          text: 'コードの役割を3層に分離:',
          code: `Controller -> Service -> Repository -> Model`,
          language: 'php'
        }
      ]
    },
    zh: {
      title: '核心架构与全局辅助函数',
      subtitle: '深入了解 Zen PHP 框架中的 MVC 模式、服务-存储库模式以及全局辅助函数。',
      sections: [
        {
          id: 'mvc-service-repository',
          heading: '1. 企业级分层架构',
          text: 'Zen PHP 将应用逻辑清晰地划分为 3 个核心层：',
          code: `Controller -> Service -> Repository -> Model`,
          language: 'php'
        }
      ]
    }
  },

  'routing-middleware': {
    id: {
      title: 'Routing & Middleware Engine',
      subtitle: 'Panduan lengkap pendefinisian rute web & API, parameter dinamis, named routes, route caching, serta implementasi HTTP Middleware (CORS, Auth, Security).',
      sections: [
        {
          id: 'route-definition',
          heading: '1. Pendefinisian Route Web & API',
          text: 'Semua rute web didaftarkan di routes/web.php dan rute REST API di routes/api.php menggunakan kelas App\\Core\\Route:',
          code: `use App\\Core\\Route;\nuse App\\Controllers\\HomeController;\nuse App\\Controllers\\ProductController;\n\n// Basic GET Route dengan Closure\nRoute::get('/', function () {\n    return view('welcome');\n});\n\n// Route mengarah ke Controller & Named Route\nRoute::get('/about', [HomeController::class, 'about'])->name('about');\n\n// HTTP Methods yang didukung\nRoute::get('/products', [ProductController::class, 'index']);\nRoute::post('/products', [ProductController::class, 'store']);\nRoute::put('/products/{id}', [ProductController::class, 'update']);\nRoute::delete('/products/{id}', [ProductController::class, 'destroy']);`,
          language: 'php'
        },
        {
          id: 'dynamic-parameters',
          heading: '2. Parameter Dinamis & Grouping Rute',
          text: 'Anda dapat menangkap URI parameter dinamis dan mengelompokkan rute dengan prefix & middleware:',
          code: `// Route Parameter Dinamis\nRoute::get('/users/{id}', function ($id) {\n    return "User ID: " . $id;\n});\n\n// Route Grouping dengan Prefix & Middleware\nRoute::group([\n    'prefix' => '/api/v1',\n    'middleware' => [\\App\\Middleware\\AuthMiddleware::class, \\App\\Middleware\\CorsMiddleware::class]\n], function () {\n    Route::get('/profile', [UserController::class, 'profile']);\n    Route::post('/settings', [UserController::class, 'updateSettings']);\n});`,
          language: 'php'
        },
        {
          id: 'middleware-engine',
          heading: '3. HTTP Middleware Engine',
          text: 'Middleware menangkap HTTP request sebelum mencapai controller. Anda dapat membuat middleware baru menggunakan Zen CLI:',
          code: `# Buat middleware baru via Zen CLI\nphp zen make:middleware AdminMiddleware`,
          language: 'bash'
        },
        {
          id: 'middleware-code',
          heading: '4. Implementasi Middleware (app/middleware/AdminMiddleware.php)',
          text: 'Setiap kelas middleware harus mengimplementasikan method handle():',
          code: `namespace App\\Middleware;\n\nclass AdminMiddleware\n{\n    public function handle($request, $next)\n    {\n        $user = auth()->user();\n        \n        if (!$user || $user['role'] !== 'admin') {\n            if ($request->isJson()) {\n                return response()->json(['error' => 'Unauthorized Access'], 403);\n            }\n            redirect('/login')->with('error', 'Akses ditolak.');\n            exit;\n        }\n\n        return $next($request);\n    }\n}`,
          language: 'php'
        },
        {
          id: 'route-caching',
          heading: '5. Route Caching & Optimasi',
          text: 'Untuk meningkatkan performa aplikasi di lingkungan produksi, Anda dapat mengompilasi rute ke dalam berkas cache:',
          code: `# Kompilasi rute ke dalam cache\nphp zen route:cache\n\n# Hapus cache rute\nphp zen route:clear`,
          language: 'bash'
        }
      ]
    },
    en: {
      title: 'Routing & Middleware Engine',
      subtitle: 'Complete guide to defining Web & API routes, dynamic parameters, named routes, route caching, and HTTP Middleware (CORS, Auth, Security).',
      sections: [
        {
          id: 'route-definition',
          heading: '1. Web & API Route Definitions',
          text: 'Web routes are registered in routes/web.php and REST API routes in routes/api.php:',
          code: `use App\\Core\\Route;\nuse App\\Controllers\\ProductController;\n\nRoute::get('/products', [ProductController::class, 'index'])->name('products.index');\nRoute::post('/products', [ProductController::class, 'store']);\nRoute::put('/products/{id}', [ProductController::class, 'update']);\nRoute::delete('/products/{id}', [ProductController::class, 'destroy']);`,
          language: 'php'
        },
        {
          id: 'middleware-code',
          heading: '2. Custom Middleware Implementation',
          text: 'Create and attach middleware to routes:',
          code: `namespace App\\Middleware;\n\nclass AuthMiddleware\n{\n    public function handle($request, $next)\n    {\n        if (!auth()->check()) {\n            return response()->json(['message' => 'Unauthenticated'], 401);\n        }\n        return $next($request);\n    }\n}`,
          language: 'php'
        }
      ]
    },
    ja: {
      title: 'ルーティング & ミドルウェアエンジン',
      subtitle: 'Web/API ルーティング、動的パラメータ、ルートキャッシュ、ミドルウェアの実装。',
      sections: [
        {
          id: 'route-definition',
          heading: '1. ルートの定義',
          text: 'routes/web.php でのルート定義:',
          code: `use App\\Core\\Route;\nRoute::get('/products', [ProductController::class, 'index']);`,
          language: 'php'
        }
      ]
    },
    zh: {
      title: '路由与中间件引擎',
      subtitle: 'Web 与 API 路由定义、动态参数、命名路由、路由缓存及中间件实现。',
      sections: [
        {
          id: 'route-definition',
          heading: '1. Web 与 API 路由定义',
          text: '在 routes/web.php 中注册路由：',
          code: `use App\\Core\\Route;\nRoute::get('/products', [ProductController::class, 'index']);`,
          language: 'php'
        }
      ]
    }
  },

  'controllers-services': {
    id: {
      title: 'Controllers, Services & Repositories',
      subtitle: 'Penerapan Clean Architecture pada Zen PHP Framework: Pemisahan peran Controller, Service Business Logic, Repository Data Layer, dan Input Validation.',
      sections: [
        {
          id: 'controller-layer',
          heading: '1. Controller Layer (App\\Controllers)',
          text: 'Controller bertugas menerima HTTP request, memvalidasi input, memanggil Service, dan mengembalikan response:',
          code: `namespace App\\Controllers;\n\nuse App\\Core\\Controller;\nuse App\\Services\\ProductService;\nuse App\\Core\\Validator;\n\nclass ProductController extends Controller\n{\n    protected ProductService $productService;\n\n    public function __construct(?ProductService $productService = null)\n    {\n        $this->productService = $productService ?? new ProductService();\n    }\n\n    public function store()\n    {\n        $input = request()->all();\n        \n        $validator = Validator::make($input, [\n            'name'  => 'required|string|min:3',\n            'price' => 'required|numeric'\n        ]);\n\n        if ($validator->fails()) {\n            return response()->json(['errors' => $validator->errors()], 422);\n        }\n\n        $result = $this->productService->createProduct($input);\n        return response()->json($result, $result['status'] ? 201 : 400);\n    }\n}`,
          language: 'php'
        },
        {
          id: 'service-layer',
          heading: '2. Service Layer (App\\Services)',
          text: 'Service menampung seluruh logika bisnis (business logic) aplikasi:',
          code: `namespace App\\Services;\n\nuse App\\Repositories\\ProductRepository;\n\nclass ProductService extends BaseService\n{\n    protected ProductRepository $productRepo;\n\n    public function __construct(?ProductRepository $productRepo = null)\n    {\n        $this->productRepo = $productRepo ?? new ProductRepository();\n    }\n\n    public function createProduct(array $data)\n    {\n        // Kalkulasi diskon atau logika bisnis lainnya\n        if ($data['price'] > 1000000) {\n            $data['discount'] = 10; // Diskon 10%\n        }\n\n        try {\n            $product = $this->productRepo->create($data);\n            return $this->success($product, 'Produk berhasil dibuat.');\n        } catch (\\Throwable $e) {\n            return $this->error('Gagal menyimpan produk: ' . $e->getMessage());\n        }\n    }\n}`,
          language: 'php'
        },
        {
          id: 'repository-layer',
          heading: '3. Repository Layer (App\\Repositories)',
          text: 'Repository bertindak sebagai abstraksi query database ke Active Record Model:',
          code: `namespace App\\Repositories;\n\nuse App\\Models\\Product;\n\nclass ProductRepository extends BaseRepository\n{\n    protected function getModelClass(): string\n    {\n        return Product::class;\n    }\n\n    public function getExpensiveProducts($minPrice = 5000000)\n    {\n        return Product::where('price', '>=', $minPrice)->get();\n    }\n}`,
          language: 'php'
        },
        {
          id: 'model-layer',
          heading: '4. Model Layer (App\\Models\\Product.php)',
          text: 'Model merepresentasikan tabel database:',
          code: `namespace App\\Models;\n\nuse App\\Core\\Model;\n\nclass Product extends Model\n{\n    protected $table = 'products';\n    protected $fillable = ['name', 'price', 'discount'];\n}`,
          language: 'php'
        }
      ]
    },
    en: {
      title: 'Controllers, Services & Repositories',
      subtitle: 'Clean Architecture implementation in Zen PHP Framework: Separating Controllers, Services, Repositories, and Request Validation.',
      sections: [
        {
          id: 'controller-layer',
          heading: '1. Controller Layer Implementation',
          text: 'Controllers handle HTTP requests and invoke Services:',
          code: `namespace App\\Controllers;\n\nuse App\\Core\\Controller;\nuse App\\Services\\ProductService;\n\nclass ProductController extends Controller\n{\n    public function index()\n    {\n        $products = (new ProductService())->getAllProducts();\n        return response()->json($products);\n    }\n}`,
          language: 'php'
        }
      ]
    },
    ja: {
      title: 'コントローラー、サービス & リポジトリ',
      subtitle: 'コントローラー、サービス層、リポジトリ層の役割分担。',
      sections: [
        {
          id: 'controller-layer',
          heading: '1. コントローラーの実装',
          text: 'コントローラーの基本コード:',
          code: `namespace App\\Controllers;\nclass ProductController extends Controller {}`,
          language: 'php'
        }
      ]
    },
    zh: {
      title: '控制器、服务与存储库',
      subtitle: 'Zen PHP 框架中的整洁架构实现：控制器、服务业务逻辑、存储库与输入验证。',
      sections: [
        {
          id: 'controller-layer',
          heading: '1. 控制器层实现',
          text: '控制器负责处理 HTTP 请求与分发：',
          code: `namespace App\\Controllers;\nclass ProductController extends Controller {}`,
          language: 'php'
        }
      ]
    }
  },

  'react-preset': {
    id: {
      title: 'React 18 & Inertia.js SPA (+ Full CRUD Tutorial)',
      subtitle: 'Panduan lengkap Single Page Application (SPA) menggunakan React 18, Inertia.js, Vite HMR, TailwindCSS v4, dan Tutorial CRUD Produk lengkap.',
      sections: [
        {
          id: 'activation',
          heading: '1. Aktivasi React 18 Preset',
          text: 'Jalankan perintah Zen CLI berikut untuk mengonfigurasi React Inertia Preset:',
          code: `# 1. Aktifkan preset React 18 Inertia\nphp zen preset:react\n\n# 2. Install paket npm Node.js\nnpm install\n\n# 3. Jalankan server dev gabungan\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'crud-route',
          heading: '2. Definisi Web Route CRUD (routes/web.php)',
          text: 'Daftarkan rute web untuk menampilkan aplikasi React Inertia CRUD:',
          code: `use App\\Core\\Route;\nuse App\\Controllers\\ProductReactController;\n\nRoute::get('/products', [ProductReactController::class, 'index'])->name('products.index');\nRoute::post('/products', [ProductReactController::class, 'store'])->name('products.store');\nRoute::delete('/products/{id}', [ProductReactController::class, 'destroy'])->name('products.destroy');`,
          language: 'php'
        },
        {
          id: 'crud-controller',
          heading: '3. Controller React Inertia (app/controllers/ProductReactController.php)',
          text: 'Controller mengirim data ke komponen React via Inertia::render():',
          code: `namespace App\\Controllers;\n\nuse App\\Core\\Controller;\nuse App\\Services\\ProductService;\nuse Inertia\\Inertia;\n\nclass ProductReactController extends Controller\n{\n    protected ProductService $service;\n\n    public function __construct()\n    {\n        $this->service = new ProductService();\n    }\n\n    public function index()\n    {\n        return Inertia::render('Pages/Products/Index', [\n            'title' => 'Manajemen Produk React 18',\n            'products' => $this->service->getAllProducts()\n        ]);\n    }\n\n    public function store()\n    {\n        $data = request()->all();\n        $this->service->createProduct($data);\n        return redirect('/products')->with('message', 'Produk berhasil ditambahkan!');\n    }\n\n    public function destroy($id)\n    {\n        $this->service->deleteProduct($id);\n        return redirect('/products')->with('message', 'Produk berhasil dihapus!');\n    }\n}`,
          language: 'php'
        },
        {
          id: 'crud-react-component',
          heading: '4. Komponen React CRUD (resources/js/Pages/Products/Index.jsx)',
          text: 'Komponen React 18 reaktif dengan form modal tambah produk dan fungsi hapus:',
          code: `import React, { useState } from 'react';\nimport { Head, router } from '@inertiajs/react';\n\nexport default function ProductIndex({ title, products }) {\n  const [name, setName] = useState('');\n  const [price, setPrice] = useState('');\n\n  const handleSubmit = (e) => {\n    e.preventDefault();\n    if (!name || !price) return;\n\n    router.post('/products', { name, price: Number(price) }, {\n      onSuccess: () => {\n        setName('');\n        setPrice('');\n      }\n    });\n  };\n\n  const handleDelete = (id) => {\n    if (confirm('Hapus produk ini?')) {\n      router.delete(\`/products/\${id}\`);\n    }\n  };\n\n  return (\n    <>\n      <Head title={title} />\n      <div className="min-h-screen bg-slate-950 text-white p-8 font-sans">\n        <div className="max-w-4xl mx-auto space-y-6">\n          <h1 className="text-3xl font-black text-sky-400">{title}</h1>\n          \n          {/* Form Tambah Produk */}\n          <form onSubmit={handleSubmit} className="flex gap-3 bg-slate-900 p-4 rounded-2xl border border-slate-800">\n            <input \n              value={name} \n              onChange={(e) => setName(e.target.value)} \n              placeholder="Nama Produk"\n              className="px-4 py-2 bg-slate-950 rounded-xl border border-slate-700 text-sm flex-1 focus:outline-none focus:border-sky-500"\n            />\n            <input \n              type="number" \n              value={price} \n              onChange={(e) => setPrice(e.target.value)} \n              placeholder="Harga (Rp)"\n              className="px-4 py-2 bg-slate-950 rounded-xl border border-slate-700 text-sm w-40 focus:outline-none focus:border-sky-500"\n            />\n            <button type="submit" className="px-6 py-2 bg-sky-500 text-slate-950 font-bold rounded-xl text-sm hover:bg-sky-400 transition">\n              + Tambah\n            </button>\n          </form>\n\n          {/* Tabel Daftar Produk */}\n          <div className="space-y-3">\n            {products.map(item => (\n              <div key={item.id} className="p-4 bg-slate-900 border border-slate-800 rounded-2xl flex justify-between items-center">\n                <div>\n                  <h3 className="font-bold text-slate-200">{item.name}</h3>\n                  <p className="text-xs text-slate-400">Rp {Number(item.price).toLocaleString()}</p>\n                </div>\n                <button onClick={() => handleDelete(item.id)} className="text-xs text-rose-400 hover:underline font-bold">\n                  Hapus\n                </button>\n              </div>\n            ))}\n          </div>\n        </div>\n      </div>\n    </>\n  );\n}`,
          language: 'jsx'
        }
      ]
    },
    en: {
      title: 'React 18 & Inertia.js SPA (+ Full CRUD Tutorial)',
      subtitle: 'Complete Single Page Application (SPA) guide using React 18, Inertia.js, Vite HMR, and complete Product CRUD tutorial.',
      sections: [
        {
          id: 'activation',
          heading: '1. React Preset Activation',
          text: 'Activate the React 18 Inertia preset:',
          code: `php zen preset:react\nnpm install\ncomposer run dev`,
          language: 'bash'
        }
      ]
    },
    ja: {
      title: 'React 18 & Inertia.js SPA (+ フル CRUD チュートリアル)',
      subtitle: 'React 18、Inertia.js、Vite HMR を使用した製品 CRUD の完全ガイド。',
      sections: [
        {
          id: 'activation',
          heading: '1. 有効化コマンド',
          text: '以下のコマンドを実行:',
          code: `php zen preset:react`,
          language: 'bash'
        }
      ]
    },
    zh: {
      title: 'React 18 & Inertia.js 单页应用 (+ 完整 CRUD 教程)',
      subtitle: '使用 React 18、Inertia.js、Vite HMR 构建单页应用及产品 CRUD 的完整教程。',
      sections: [
        {
          id: 'activation',
          heading: '1. 激活 React 预设',
          text: '运行预设命令行：',
          code: `php zen preset:react`,
          language: 'bash'
        }
      ]
    }
  },

  'pulse-preset': {
    id: {
      title: 'Zen Pulse Live Engine (+ Full CRUD Tutorial)',
      subtitle: 'Komponen Blade reaktif berbasis server-driven tanpa bundler JavaScript eksternal dan Tutorial CRUD Task Live.',
      sections: [
        {
          id: 'activation',
          heading: '1. Aktivasi Pulse Preset',
          text: 'Aktifkan Zen Pulse Engine di project Anda:',
          code: `php zen preset:pulse\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'pulse-route',
          heading: '2. Definisi Endpoint Pulse (routes/web.php)',
          text: 'Daftarkan endpoint Zen Pulse:',
          code: `use App\\Core\\Route;\nuse App\\Controllers\\PulseController;\n\nRoute::get('/tasks', function () {\n    return view('pulse.tasks');\n});\nRoute::post('/_zen/pulse', [PulseController::class, 'handle'])->name('zen.pulse');`,
          language: 'php'
        },
        {
          id: 'pulse-view',
          heading: '3. Blade Pulse Component (app/views/pulse/tasks.php)',
          text: 'Gunakan atribut zen-click dan zen-model untuk interaksi reaktif tanpa memuat ulang halaman:',
          code: `<div class="p-6 bg-slate-900 border border-slate-800 rounded-2xl max-w-xl mx-auto text-white font-sans">\n    <h2 class="text-2xl font-bold text-emerald-400 mb-4">Live Task Manager (Zen Pulse)</h2>\n\n    <!-- Input Reaktif -->\n    <div class="flex gap-2 mb-4">\n        <input \n            type="text" \n            zen-model="taskTitle" \n            placeholder="Tambah tugas baru..."\n            class="px-4 py-2 bg-slate-950 border border-slate-700 rounded-xl text-sm flex-1 focus:outline-none focus:border-emerald-500"\n        />\n        <button zen-click="addTask" class="px-5 py-2 bg-emerald-500 text-slate-950 font-bold rounded-xl text-sm hover:bg-emerald-400 transition">\n            Tambah\n        </button>\n    </div>\n\n    <!-- Daftar Task Real-time -->\n    <ul class="space-y-2">\n        <?php foreach ($tasks ?? [] as $index => $task): ?>\n            <li class="p-3 bg-slate-950 rounded-xl border border-slate-800 flex justify-between items-center text-sm">\n                <span><?= htmlspecialchars($task) ?></span>\n                <button zen-click="removeTask(<?= $index ?>)" class="text-rose-400 text-xs hover:underline">Hapus</button>\n            </li>\n        <?php endforeach; ?>\n    </ul>\n</div>`,
          language: 'html'
        }
      ]
    },
    en: {
      title: 'Zen Pulse Live Engine (+ Full CRUD Tutorial)',
      subtitle: 'Server-driven reactive Blade components with zero external JavaScript bundlers and Task Live CRUD tutorial.',
      sections: [
        {
          id: 'activation',
          heading: '1. Pulse Preset Activation',
          text: 'Activate Zen Pulse Live Engine:',
          code: `php zen preset:pulse\ncomposer run dev`,
          language: 'bash'
        }
      ]
    },
    ja: {
      title: 'Zen Pulse ライブリアクティブ (+ フル CRUD)',
      subtitle: 'JS バンドラー不要のサーバー駆動型リアクティブ Blade コンポーネント。',
      sections: [
        {
          id: 'activation',
          heading: '1. Pulse の有効化',
          text: 'Zen Pulse を有効化:',
          code: `php zen preset:pulse`,
          language: 'bash'
        }
      ]
    },
    zh: {
      title: 'Zen Pulse 实时响应式引擎 (+ 完整 CRUD)',
      subtitle: '无需外部 JavaScript 打包工具的服务端驱动 Blade 响应式组件及 Live CRUD 教程。',
      sections: [
        {
          id: 'activation',
          heading: '1. 激活 Pulse 预设',
          text: '开启 Zen Pulse 引擎：',
          code: `php zen preset:pulse`,
          language: 'bash'
        }
      ]
    }
  },

  'api-preset': {
    id: {
      title: 'Dedicated REST API & Swagger UI (+ Full CRUD Tutorial)',
      subtitle: 'Mode dedicated REST API berkinerja tinggi dengan format Standard Enterprise JSON Envelope, Swagger UI di /docs, dan Tutorial RESTful Product API CRUD lengkap.',
      sections: [
        {
          id: 'activation',
          heading: '1. Mengaktifkan Mode Dedicated REST API',
          text: 'Jalankan perintah preset CLI untuk mengonfigurasi backend API:',
          code: `php zen preset:api`,
          language: 'bash'
        },
        {
          id: 'api-routes',
          heading: '2. Route API (routes/api.php)',
          text: 'Daftarkan rute RESTful API:',
          code: `use App\\Core\\Route;\nuse App\\Controllers\\Api\\ProductApiController;\n\nRoute::group(['prefix' => '/api/v1'], function () {\n    Route::get('/products', [ProductApiController::class, 'index']);\n    Route::get('/products/{id}', [ProductApiController::class, 'show']);\n    Route::post('/products', [ProductApiController::class, 'store']);\n    Route::put('/products/{id}', [ProductApiController::class, 'update']);\n    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);\n});`,
          language: 'php'
        },
        {
          id: 'api-controller',
          heading: '3. API Controller (app/controllers/Api/ProductApiController.php)',
          text: 'Controller menggunakan trait ApiResponse untuk mengembalikan Enterprise JSON Envelopes:',
          code: `namespace App\\Controllers\\Api;\n\nuse App\\Core\\Controller;\nuse App\\Core\\ApiResponse;\nuse App\\Core\\Validator;\nuse App\\Services\\ProductService;\n\nclass ProductApiController extends Controller\n{\n    use ApiResponse;\n\n    protected ProductService $service;\n\n    public function __construct()\n    {\n        $this->service = new ProductService();\n    }\n\n    public function index()\n    {\n        $products = $this->service->getAllProducts();\n        return $this->sendSuccess($products, 'Products retrieved successfully');\n    }\n\n    public function store()\n    {\n        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;\n\n        $validator = Validator::make($input, [\n            'name'  => 'required|string|min:3',\n            'price' => 'required|numeric'\n        ]);\n\n        if ($validator->fails()) {\n            return $this->sendValidationError($validator->errors());\n        }\n\n        $result = $this->service->createProduct($input);\n        return $this->sendSuccess($result['data'], 'Product created successfully', 201);\n    }\n\n    public function destroy($id)\n    {\n        $this->service->deleteProduct($id);\n        return $this->sendSuccess(null, 'Product deleted successfully');\n    }\n}`,
          language: 'php'
        },
        {
          id: 'json-envelope',
          heading: '4. Format Response JSON Enterprise Envelope Standard',
          text: 'Semua response REST API otomatis dibungkus dengan skema JSON standar:',
          code: `// Response Sukses (200 OK / 201 Created)\n{\n  "status": true,\n  "success": true,\n  "message": "Products retrieved successfully",\n  "data": [\n    {\n      "id": 1,\n      "name": "Zen Enterprise Server",\n      "price": 2500000\n    }\n  ]\n}\n\n// Response Error Validasi (422 Unprocessable Entity)\n{\n  "status": false,\n  "success": false,\n  "message": "Validation failed",\n  "errors": {\n    "name": ["The name field is required."]\n  },\n  "code": 422\n}`,
          language: 'json'
        }
      ]
    },
    en: {
      title: 'Dedicated REST API & Swagger UI (+ Full CRUD Tutorial)',
      subtitle: 'High-performance Dedicated REST API Mode with Enterprise JSON Envelopes, Swagger UI at /docs, and RESTful Product API CRUD tutorial.',
      sections: [
        {
          id: 'activation',
          heading: '1. Dedicated REST API Activation',
          text: 'Run the CLI preset command to configure the API backend:',
          code: `php zen preset:api`,
          language: 'bash'
        }
      ]
    },
    ja: {
      title: '専用 REST API & Swagger UI (+ フル CRUD)',
      subtitle: 'エンタープライズ JSON レスポンス形式と Swagger UI を備えた REST API CRUD チュートリアル。',
      sections: [
        {
          id: 'activation',
          heading: '1. Dedicated REST API の有効化',
          text: 'CLI コマンドで REST API モードに切替:',
          code: `php zen preset:api`,
          language: 'bash'
        }
      ]
    },
    zh: {
      title: '专用 REST API 与 Swagger OpenAPI UI (+ 完整 CRUD)',
      subtitle: '具有标准企业级 JSON 响结构及 Swagger UI 的 RESTful API CRUD 完整教程。',
      sections: [
        {
          id: 'activation',
          heading: '1. 开启专用 REST API 模式',
          text: '运行预设命令行：',
          code: `php zen preset:api`,
          language: 'bash'
        }
      ]
    }
  },

  'authorization': {
    id: {
      title: 'Authorization & Security Engine',
      subtitle: 'Sistem otorisasi Gate & Policy tingkat enterprise dengan dukungan helper authorize(), gate(), dan Blade directives.',
      sections: [
        {
          id: 'gate-definition',
          heading: '1. Definisi Gate & Policy (App\\Core\\Gate)',
          text: 'Definisikan hak akses pada bootstrap aplikasi:',
          code: `use App\\Core\\Gate;\n\n// Definisi Gate Ability Callback\nGate::define('edit-product', function ($user, $product) {\n    return $user['id'] === $product['user_id'] || ($user['role'] ?? '') === 'admin';\n});\n\n// Pemetaan Model ke Policy Class\nGate::policy(\\App\\Models\\Product::class, \\App\\Policies\\ProductPolicy::class);`,
          language: 'php'
        },
        {
          id: 'authorize-helpers',
          heading: '2. Helper Otorisasi dalam Controller',
          text: 'Gunakan helper gate() atau authorize() di controller:',
          code: `// Cek izin (returns boolean)\nif (gate()->allows('edit-product', $product)) {\n    // Lakukan edit\n}\n\n// Otorisasi langsung atau lempar HTTP 403 Forbidden Exception\nauthorize('edit-product', $product);`,
          language: 'php'
        },
        {
          id: 'blade-directives',
          heading: '3. Directives Otorisasi Blade (@can & @auth)',
          text: 'Gunakan direktif Blade di view template untuk membatasi tampilan UI:',
          code: `@can('edit-product', $product)\n    <a href="/products/1/edit" class="btn btn-sm">Edit Produk</a>\n@endcan\n\n@auth\n    <p>Selamat datang kembali, <?= auth()->user()['name'] ?></p>\n@endauth`,
          language: 'html'
        }
      ]
    },
    en: {
      title: 'Authorization & Security Engine',
      subtitle: 'Enterprise-grade Gate & Policy authorization engine with authorize() helper and Blade directives.',
      sections: [
        {
          id: 'gate-definition',
          heading: '1. Defining Gates & Policies',
          text: 'Define access permissions in app bootstrap:',
          code: `use App\\Core\\Gate;\n\nGate::define('edit-product', function ($user, $product) {\n    return $user['id'] === $product['user_id'] || ($user['role'] ?? '') === 'admin';\n});`,
          language: 'php'
        }
      ]
    },
    ja: {
      title: '認可 & セキュリティエンジン',
      subtitle: 'Gate & Policy 認可システムと Blade ディレクティブ。',
      sections: [
        {
          id: 'gate-definition',
          heading: '1. 権限の定義',
          text: 'アクセス権限の定義手順:',
          code: `use App\\Core\\Gate;\nGate::define('edit-product', function ($user, $product) {\n    return $user['id'] === $product['user_id'];\n});`,
          language: 'php'
        }
      ]
    },
    zh: {
      title: '授权与安全引擎',
      subtitle: '支持多 Guard 身份验证的企业级 Gate 与 Policy 授权引擎。',
      sections: [
        {
          id: 'gate-definition',
          heading: '1. 定义权限 Gates',
          text: '在应用初始化中定义访问权限：',
          code: `use App\\Core\\Gate;\nGate::define('edit-product', function ($user, $product) {\n    return $user['id'] === $product['user_id'];\n});`,
          language: 'php'
        }
      ]
    }
  },

  'cli-commands': {
    id: {
      title: 'Zen CLI Artisan Tool Commands',
      subtitle: 'Referensi lengkap perintah CLI php zen untuk membuat controller, model, migrasi, dan mengoptimalkan framework.',
      sections: [
        {
          id: 'dev-commands',
          heading: '1. Perintah Server & Development',
          text: 'Menjalankan server dan pengujian:',
          code: `php zen dev        # Menjalankan PHP + Vite HMR server bersamaan\nphp zen serve      # Menjalankan server PHP di 127.0.0.1:8000\nphp zen test       # Menjalankan test suite Pest PHP`,
          language: 'bash'
        },
        {
          id: 'generator-commands',
          heading: '2. Perintah Code Generator (make:*)',
          text: 'Membuat berkas skafel komponen MVC & Clean Architecture:',
          code: `php zen make:controller ProductController\nphp zen make:model Product\nphp zen make:service ProductService\nphp zen make:repository ProductRepository\nphp zen make:middleware AuthMiddleware\nphp zen make:migration create_products_table\nphp zen make:seeder ProductSeeder`,
          language: 'bash'
        },
        {
          id: 'database-commands',
          heading: '3. Perintah Database & Migrasi',
          text: 'Mengelola skema database:',
          code: `php zen migrate           # Menjalankan semua migrasi pending\nphp zen migrate:rollback  # Batalkan migrasi terakhir\nphp zen migrate:fresh     # Drop tabel dan jalankan ulang migrasi\nphp zen db:seed           # Jalankan database seeders`,
          language: 'bash'
        },
        {
          id: 'optimization-commands',
          heading: '4. Perintah Optimasi & Maintenance',
          text: 'Pembersihan cache dan optimasi bootstrapping:',
          code: `php zen clear           # Hapus berkas temporary, session, & cache view\nphp zen optimize        # Kompilasi dan optimalkan rute & bootstrap\nphp zen key:generate    # Generasi 32-byte APP_KEY baru`,
          language: 'bash'
        }
      ]
    },
    en: {
      title: 'Zen CLI Artisan Tool Commands',
      subtitle: 'Complete reference of php zen CLI commands for code scaffolding, database migrations, and optimization.',
      sections: [
        {
          id: 'dev-commands',
          heading: '1. Server & Development Commands',
          text: 'Run development servers and test suite:',
          code: `php zen dev        # Run PHP + Vite HMR concurrently\nphp zen serve      # Run PHP server at 127.0.0.1:8000\nphp zen test       # Run Pest PHP test suite`,
          language: 'bash'
        }
      ]
    },
    ja: {
      title: 'Zen CLI Artisan ツールコマンド',
      subtitle: 'php zen CLI コマンドの完全リファレンス。',
      sections: [
        {
          id: 'dev-commands',
          heading: '1. 開発サーバーコマンド',
          text: 'サーバーの起動とテスト:',
          code: `php zen dev        # PHP + Vite HMR 並行起動\nphp zen serve      # PHP サーバー起動\nphp zen test       # Pest PHP テスト実行`,
          language: 'bash'
        }
      ]
    },
    zh: {
      title: 'Zen CLI Artisan 工具命令',
      subtitle: 'php zen Artisan 命令行工具完整命令参考。',
      sections: [
        {
          id: 'dev-commands',
          heading: '1. 开发服务与测试命令',
          text: '启动服务与自动化测试：',
          code: `php zen dev        # 并行启动 PHP 服务与 Vite HMR\nphp zen serve      # 启动 PHP 开发服务\nphp zen test       # 运行 Pest PHP 测试套件`,
          language: 'bash'
        }
      ]
    }
  },

  'testing': {
    id: {
      title: 'Testing Engine with Pest PHP',
      subtitle: 'Panduan menulis unit test dan feature test otomatis menggunakan Pest PHP.',
      sections: [
        {
          id: 'run-test',
          heading: '1. Menjalankan Test Suite',
          text: 'Jalankan pengujian via CLI:',
          code: `php zen test\n# Atau\nvendor/bin/pest`,
          language: 'bash'
        },
        {
          id: 'example-test',
          heading: '2. Contoh Kode Test (tests/Feature/ProductTest.php)',
          text: 'Penulisan test ekspresif untuk menguji fitur CRUD & Gate Authorization:',
          code: `test('halaman daftar produk dapat diakses', function () {\n    $response = $this->get('/products');\n    $response->assertStatus(200);\n});\n\ntest('pengguna tanpa izin tidak dapat menghapus produk', function () {\n    $user = ['id' => 2, 'role' => 'member'];\n    $product = ['user_id' => 1];\n    \n    expect(gate()->forUser($user)->allows('edit-product', $product))->toBeFalse();\n});`,
          language: 'php'
        }
      ]
    },
    en: {
      title: 'Testing Engine with Pest PHP',
      subtitle: 'Automated unit & feature testing using modern Pest PHP syntax.',
      sections: [
        {
          id: 'run-test',
          heading: '1. Running Test Suite',
          text: 'Execute tests via CLI:',
          code: `php zen test\n# Or\nvendor/bin/pest`,
          language: 'bash'
        }
      ]
    },
    ja: {
      title: 'Pest PHP テストエンジン',
      subtitle: 'Pest PHP を使用した自動テスト。',
      sections: [
        {
          id: 'run-test',
          heading: '1. テストの実行',
          text: 'CLI でテストを実行:',
          code: `php zen test`,
          language: 'bash'
        }
      ]
    },
    zh: {
      title: 'Pest PHP 测试引擎',
      subtitle: '使用现代 Pest PHP 语法进行自动化单元测试与功能测试。',
      sections: [
        {
          id: 'run-test',
          heading: '1. 运行测试套件',
          text: '通过 CLI 运行测试：',
          code: `php zen test`,
          language: 'bash'
        }
      ]
    }
  },

  'ai-agents': {
    id: {
      title: 'AI Assistant Handbook (AGENTS.md)',
      subtitle: 'Pedoman standar arsitektur dan instruksi kerja untuk AI pair programmer.',
      sections: [
        {
          id: 'ai-guidelines',
          heading: '1. Ringkasan Pedoman AI Agent',
          text: 'File AGENTS.md pada direktori utama memberikan konteks berikut kepada AI coding assistant:',
          items: [
            'Arsitektur wajib: MVC + Service-Repository Pattern.',
            'Penggunaan Helper Global: view(), react(), response(), authorize().',
            'Konvensi Penamaan: Controller (PascalCase), Model (Singular), Repository (Plural/ModelRepository).',
            'Keamanan: Penggunaan Gate & Policy untuk authorization.'
          ],
          code: `# Contoh Instruksi AI Agent:\n"Gunakan Service-Repository pattern saat menambahkan fitur CRUD produk."`,
          language: 'text'
        }
      ]
    },
    en: {
      title: 'AI Assistant Handbook (AGENTS.md)',
      subtitle: 'Standard architectural guidelines and prompts for AI pair programming.',
      sections: [
        {
          id: 'ai-guidelines',
          heading: '1. AI Agent Guidelines Summary',
          text: 'The AGENTS.md file in the root directory provides context for AI coding assistants:',
          code: `# AI Agent Prompt Example:\n"Apply Service-Repository pattern when creating product CRUD functionality."`,
          language: 'text'
        }
      ]
    },
    ja: {
      title: 'AI アシスタントハンドブック (AGENTS.md)',
      subtitle: 'AI ペアプログラミングのための標準アーキテクチャガイドライン。',
      sections: [
        {
          id: 'ai-guidelines',
          heading: '1. AI エージェントガイドラインの概要',
          text: 'AGENTS.md ファイルの主な記述内容:',
          code: `# 提示例:\n"製品 CRUD の追加時にはサービス・リポジトリパターンを適用してください。"`,
          language: 'text'
        }
      ]
    },
    zh: {
      title: 'AI 助手开发手册 (AGENTS.md)',
      subtitle: '针对 AI 结对编程的标准架构指南与操作规范。',
      sections: [
        {
          id: 'ai-guidelines',
          heading: '1. AI 编程规范摘要',
          text: '根目录下的 AGENTS.md 文件为 AI 编程助手提供上下文与约束：',
          code: `# AI 提示词示例:\n"在创建产品 CRUD 功能时，请严格遵守服务-存储库模式。"`,
          language: 'text'
        }
      ]
    }
  }
};
