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
      id: 'Panduan lengkap penginstalan, persyaratan sistem, dan dev server gabungan.',
      en: 'Complete installation guide, system requirements, and concurrent dev server.',
      ja: '完全なインストールガイド、システム要件、並行開発サーバー。',
      zh: '完整的安装指南、系统要求及并行开发服务器说明。'
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
      id: 'Struktur MVC, Service-Repository Pattern, dan global helper functions.',
      en: 'MVC structure, Service-Repository pattern, and global helper functions.',
      ja: 'MVC構造、サービスリポジトリパターン、グローバルヘルパー関数。',
      zh: 'MVC 结构、服务-存储库模式及全局辅助函数。'
    }
  },
  {
    slug: 'routing-middleware',
    icon: 'GitBranch',
    title: {
      id: 'Routing & Middleware',
      en: 'Routing & Middleware',
      ja: 'ルーティング & ミドルウェア',
      zh: '路由与中间件'
    },
    description: {
      id: 'Definisi route web & API, middleware CORS, Auth, dan caching route.',
      en: 'Web & API route definitions, CORS/Auth middleware, and route caching.',
      ja: 'WebおよびAPIルート定義、CORS/認証ミドルウェア、ルートキャッシュ。',
      zh: 'Web 与 API 路由定义、CORS/身份验证中间件及路由缓存。'
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
      id: 'Penerapan clean architecture pada controller, bisnis logik service, dan repository.',
      en: 'Clean architecture implementation in controllers, services, and repositories.',
      ja: 'コントローラー、サービス、リポジトリにおけるクリーンアーキテクチャの実装。',
      zh: '控制器、服务与存储库中的整洁架构实现。'
    }
  },
  {
    slug: 'react-preset',
    icon: 'Atom',
    title: {
      id: 'React 18 & Inertia.js SPA',
      en: 'React 18 & Inertia.js SPA',
      ja: 'React 18 & Inertia.js SPA',
      zh: 'React 18 & Inertia.js 单页应用'
    },
    description: {
      id: 'Panduan arsitektur Single Page Application menggunakan React 18 & Vite HMR.',
      en: 'Single Page Application guide using React 18, Inertia.js, and Vite HMR.',
      ja: 'React 18、Inertia.js、Vite HMR を使用した SPA ガイド。',
      zh: '使用 React 18、Inertia.js 和 Vite HMR 的单页应用指南。'
    }
  },
  {
    slug: 'pulse-preset',
    icon: 'Zap',
    title: {
      id: 'Zen Pulse Live Engine',
      en: 'Zen Pulse Live Engine',
      ja: 'Zen Pulse ライブリアクティブ',
      zh: 'Zen Pulse 实时响应式引擎'
    },
    description: {
      id: 'Server-driven reactive Blade components tanpa perlu bundler JS eksternal.',
      en: 'Server-driven reactive Blade components without external JS bundlers.',
      ja: '外部 JS バンドラーなしのサーバー駆動型リアクティブ Blade コンポーネント。',
      zh: '无需外部 JS 打包工具的服务端驱动 Blade 响应式组件。'
    }
  },
  {
    slug: 'api-preset',
    icon: 'Server',
    title: {
      id: 'Dedicated REST API & Swagger UI',
      en: 'Dedicated REST API & Swagger UI',
      ja: '専用 REST API & Swagger UI',
      zh: '专用 REST API 与 Swagger UI'
    },
    description: {
      id: 'API backend terstandar dengan Swagger OpenAPI UI interaktif di /docs.',
      en: 'Standardized API backend with interactive Swagger OpenAPI UI at /docs.',
      ja: '/docs で利用可能なインタラクティブ Swagger UI を備えた標準 API。',
      zh: '标准化 API 后端，在 /docs 提供交互式 Swagger OpenAPI UI。'
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
      id: 'Sistem Gate & Policy authorization tingkat enterprise dan Blade directives.',
      en: 'Enterprise-grade Gate & Policy authorization engine and Blade directives.',
      ja: 'エンタープライズグレードの Gate & Policy 認可エンジンおよび Blade ディレクティブ。',
      zh: '企业级 Gate 与 Policy 授权引擎及 Blade 指令。'
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
      id: 'Daftar lengkap perintah php zen untuk generator, migrasi, dan optimasi.',
      en: 'Complete reference of php zen commands for generators, migrations, and optimization.',
      ja: 'ジェネレーター、マイグレーション、最適化のための php zen コマンド一覧。',
      zh: '用于生成器、迁移和优化的 php zen 命令完整参考。'
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
      title: 'Getting Started & Setup (v9.1.6)',
      subtitle: 'Panduan lengkap penginstalan, persyaratan sistem, struktur folder, dan pengoperasian dev server gabungan Zen PHP Framework.',
      sections: [
        {
          id: 'system-requirements',
          heading: '1. Persyaratan Sistem',
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
          heading: '2. Cara Instalasi Framework',
          text: 'Anda dapat menginstal Zen PHP melalui Composer Create-Project atau melakukan Git Clone ke rilis spesifik:',
          code: `# Opsi 1: Instalasi via Composer (Direkomendasikan)\ncomposer create-project razenry/zen-php my-app\ncd my-app\n\n# Opsi 2: Git Clone rilis v9.1.6\ngit clone -b v9.1.6 https://github.com/razenry/zen-fr.git my-app\ncd my-app\ncomposer install`,
          language: 'bash'
        },
        {
          id: 'dev-server',
          heading: '3. Menjalankan Concurrent Dev Server',
          text: 'Zen PHP dilengkapi Built-in Concurrent Dev Server yang secara simultan menyalakan PHP HTTP server (port 8000) dan Vite HMR server (port 5173):',
          code: `# Jalankan PHP Dev Server + Vite HMR secara bersamaan\ncomposer run dev\n# Atau via Zen CLI\nphp zen dev\n\n# Atau jalankan PHP Server saja (port 8000)\nphp zen serve`,
          language: 'bash'
        },
        {
          id: 'folder-structure',
          heading: '4. Struktur Direktori Project',
          text: 'Penjelasan struktur folder Zen PHP Framework:',
          code: `my-app/\n├── AGENTS.md                  # AI Agent Guidelines Handbook\n├── app/\n│   ├── controllers/          # Web & API Controllers\n│   ├── core/                 # Core Engine (Route, Auth, Gate, Request, Response)\n│   ├── helpers/              # Global Helper Functions\n│   ├── middleware/           # HTTP Middleware (Auth, Cors, Security)\n│   ├── models/               # ORM & Active Record Models\n│   ├── repositories/         # Repository Pattern Classes\n│   ├── services/             # Business Logic Service Classes\n│   └── views/                # Views & Blade Templates\n├── database/\n│   ├── migrations/           # Database Schema Migrations\n│   └── seeders/              # Database Table Seeders\n├── public/\n│   └── index.php             # Front Controller Entry Point\n├── resources/\n│   ├── css/app.css           # TailwindCSS v4 Entry Point\n│   └── js/app.jsx            # React 18 Inertia Mounting Entry\n├── routes/\n│   ├── web.php               # Web Routes\n│   └── api.php               # REST API Routes\n└── zen                       # Executable CLI Artisan Tool`,
          language: 'text'
        }
      ]
    },
    en: {
      title: 'Getting Started & Setup (v9.1.6)',
      subtitle: 'Complete installation guide, system requirements, folder structure, and operating the concurrent development server.',
      sections: [
        {
          id: 'system-requirements',
          heading: '1. System Requirements',
          text: 'Zen PHP Framework v9.1.6 is ultra-lightweight and compatible with modern PHP environments:',
          items: [
            'PHP ^8.0 or higher',
            'Composer ^2.0',
            'Node.js ^18.0 (Optional, required for React 18 & Vite HMR)',
            'Database: MySQL, PostgreSQL, SQLite, or MariaDB'
          ],
          code: `php -v\ncomposer --version\nnode -v`,
          language: 'bash'
        },
        {
          id: 'installation',
          heading: '2. Installation Methods',
          text: 'You can install Zen PHP via Composer Create-Project or Git Clone specific releases:',
          code: `# Option 1: Installation via Composer (Recommended)\ncomposer create-project razenry/zen-php my-app\ncd my-app\n\n# Option 2: Git Clone release v9.1.6\ngit clone -b v9.1.6 https://github.com/razenry/zen-fr.git my-app\ncd my-app\ncomposer install`,
          language: 'bash'
        },
        {
          id: 'dev-server',
          heading: '3. Running Concurrent Dev Server',
          text: 'Zen PHP features a Built-in Concurrent Dev Server launching both PHP HTTP server (port 8000) and Vite HMR server (port 5173) simultaneously:',
          code: `# Run PHP Dev Server + Vite HMR concurrently\ncomposer run dev\n# Or via Zen CLI\nphp zen dev\n\n# Or run PHP Server only (port 8000)\nphp zen serve`,
          language: 'bash'
        },
        {
          id: 'folder-structure',
          heading: '4. Project Folder Structure',
          text: 'Overview of the Zen PHP Framework directory structure:',
          code: `my-app/\n├── AGENTS.md                  # AI Agent Guidelines Handbook\n├── app/\n│   ├── controllers/          # Web & API Controllers\n│   ├── core/                 # Core Engine (Route, Auth, Gate, Request, Response)\n│   ├── helpers/              # Global Helper Functions\n│   ├── middleware/           # HTTP Middleware (Auth, Cors, Security)\n│   ├── models/               # ORM & Active Record Models\n│   ├── repositories/         # Repository Pattern Classes\n│   ├── services/             # Business Logic Service Classes\n│   └── views/                # Views & Blade Templates\n├── database/\n│   ├── migrations/           # Database Schema Migrations\n│   └── seeders/              # Database Table Seeders\n├── public/\n│   └── index.php             # Front Controller Entry Point\n├── resources/\n│   ├── css/app.css           # TailwindCSS v4 Entry Point\n│   └── js/app.jsx            # React 18 Inertia Mounting Entry\n├── routes/\n│   ├── web.php               # Web Routes\n│   └── api.php               # REST API Routes\n└── zen                       # Executable CLI Artisan Tool`,
          language: 'text'
        }
      ]
    },
    ja: {
      title: 'はじめに & セットアップ (v9.1.6)',
      subtitle: 'Zen PHP Framework の完全なインストール、システム要件、ディレクトリ構造、開発サーバーの起動手順。',
      sections: [
        {
          id: 'system-requirements',
          heading: '1. システム要件',
          text: 'Zen PHP Framework v9.1.6 は超軽量でモダンな PHP 環境に対応しています:',
          items: [
            'PHP ^8.0 以上',
            'Composer ^2.0 以上',
            'Node.js ^18.0 (任意、React 18 & Vite HMR で必要)',
            'データベース: MySQL, PostgreSQL, SQLite, または MariaDB'
          ],
          code: `php -v\ncomposer --version\nnode -v`,
          language: 'bash'
        },
        {
          id: 'installation',
          heading: '2. インストール手順',
          text: 'Composer または Git Clone を使用してプロジェクトをセットアップできます:',
          code: `# 方法 1: Composer 経由でのインストール (推奨)\ncomposer create-project razenry/zen-php my-app\ncd my-app\n\n# 方法 2: v9.1.6 リリースの Git Clone\ngit clone -b v9.1.6 https://github.com/razenry/zen-fr.git my-app\ncd my-app\ncomposer install`,
          language: 'bash'
        },
        {
          id: 'dev-server',
          heading: '3. 並行開発サーバーの起動',
          text: 'PHP HTTP サーバー (ポート 8000) と Vite HMR サーバー (ポート 5173) を同時に起動できます:',
          code: `# PHP サーバーと Vite HMR を同時起動\ncomposer run dev\n# または Zen CLI を使用\nphp zen dev\n\n# PHP サーバーのみ起動 (ポート 8000)\nphp zen serve`,
          language: 'bash'
        },
        {
          id: 'folder-structure',
          heading: '4. ディレクトリ構造',
          text: 'プロジェクト構造の詳細:',
          code: `my-app/\n├── AGENTS.md                  # AI アシスタント開発ハンドブック\n├── app/\n│   ├── controllers/          # Web & API コントローラー\n│   ├── core/                 # コアエンジン\n│   ├── helpers/              # グローバルヘルパー関数\n│   ├── middleware/           # HTTP ミドルウェア\n│   ├── models/               # モデル\n│   ├── repositories/         # リポジトリ\n│   ├── services/             # サービス層\n│   └── views/                # ビューテンプレート\n└── zen                       # CLI アーティザンツール`,
          language: 'text'
        }
      ]
    },
    zh: {
      title: '入门指南与安装设置 (v9.1.6)',
      subtitle: 'Zen PHP 框架的完整安装指南、系统要求、项目目录结构及并行开发服务器的使用方法。',
      sections: [
        {
          id: 'system-requirements',
          heading: '1. 系统要求',
          text: 'Zen PHP Framework v9.1.6 采用超轻量设计，完全兼容现代 PHP 环境：',
          items: [
            'PHP ^8.0 或更高版本',
            'Composer ^2.0 或更高版本',
            'Node.js ^18.0 (可选，React 18 & Vite HMR 所需)',
            '数据库支持: MySQL, PostgreSQL, SQLite 或 MariaDB'
          ],
          code: `php -v\ncomposer --version\nnode -v`,
          language: 'bash'
        },
        {
          id: 'installation',
          heading: '2. 框架安装步骤',
          text: '您可以通过 Composer 或者 Git Clone 创建新的应用项目：',
          code: `# 方法 1: 通过 Composer 安装（推荐）\ncomposer create-project razenry/zen-php my-app\ncd my-app\n\n# 方法 2: 克隆指定 v9.1.6 版本\ngit clone -b v9.1.6 https://github.com/razenry/zen-fr.git my-app\ncd my-app\ncomposer install`,
          language: 'bash'
        },
        {
          id: 'dev-server',
          heading: '3. 启动并行开发服务器',
          text: 'Zen PHP 内置并行开发服务器，可同时启动 PHP HTTP 服务 (端口 8000) 和 Vite HMR 服务 (端口 5173)：',
          code: `# 同时启动 PHP 开发服务器与 Vite HMR\ncomposer run dev\n# 或使用 Zen CLI\nphp zen dev\n\n# 仅启动 PHP 开发服务器 (端口 8000)\nphp zen serve`,
          language: 'bash'
        },
        {
          id: 'folder-structure',
          heading: '4. 项目目录结构',
          text: 'Zen PHP 框架的核心目录结构说明：',
          code: `my-app/\n├── AGENTS.md                  # AI 助手架构指南\n├── app/\n│   ├── controllers/          # Web 与 API 控制器\n│   ├── core/                 # 框架核心引擎\n│   ├── helpers/              # 全局辅助函数\n│   ├── middleware/           # HTTP 中间件\n│   ├── models/               # ORM 模型\n│   ├── repositories/         # 存储库模式类\n│   ├── services/             # 业务逻辑服务类\n│   └── views/                # 视图与模板\n└── zen                       # 可执行 Artisan CLI 工具`,
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
          code: `// Contoh Alur Kerja:\n// Controller -> Service -> Repository -> Model -> Database`,
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
        },
        {
          id: 'global-helpers',
          heading: '2. Global Helper Functions',
          text: 'Zen PHP provides built-in global helpers accessible anywhere without imports:',
          code: `// 1. Return Blade View\nreturn view('home.index', ['title' => 'Dashboard']);\n\n// 2. Return React Inertia Component\nreturn react('Pages/UserList', ['users' => $users]);\n// or\nreturn inertia('Pages/UserList', ['users' => $users]);\n\n// 3. Return Enterprise JSON API Envelope\nreturn response()->json($data, 200, 'Successfully retrieved');\n\n// 4. Gate Authorization\ngate()->define('admin-only', fn($user) => $user['role'] === 'admin');\nauthorize('admin-only');`,
          language: 'php'
        }
      ]
    },
    ja: {
      title: 'コアアーキテクチャ & グローバルヘルパー',
      subtitle: 'Zen PHP Framework における MVC、サービス・リポジトリパターン、グローバルヘルパー関数の解説。',
      sections: [
        {
          id: 'mvc-service-repository',
          heading: '1. エンタープライズアーキテクチャパターン',
          text: 'Zen PHP はコードの役割を3つのレイヤーに分離しています:',
          items: [
            'コントローラー: HTTP リクエスト処理とレスポンスの返却。',
            'サービス層: コアビジネスロジックの記述。',
            'リポジトリ層: データベース操作と ORM クエリの分離。'
          ],
          code: `// アプリケーションフロー:\n// Controller -> Service -> Repository -> Model -> Database`,
          language: 'php'
        },
        {
          id: 'global-helpers',
          heading: '2. グローバルヘルパー関数',
          text: 'インポート不要でどこでも使えるグローバルヘルパー:',
          code: `// 1. Blade ビューの返却\nreturn view('home.index', ['title' => 'Dashboard']);\n\n// 2. React Inertia コンポーネントの返却\nreturn react('Pages/UserList', ['users' => $users]);\n\n// 3. 標準 JSON レスポンスの返却\nreturn response()->json($data, 200, 'Success');`,
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
          heading: '1. 企业级架构模式 (Service & Repository)',
          text: 'Zen PHP 将应用逻辑清晰地划分为 3 个核心层：',
          items: [
            'Controller (控制器): 处理 HTTP 请求与响应。',
            'Service (服务层): 封装核心业务逻辑。',
            'Repository (存储库层): 隔离数据库查询与数据持久化。'
          ],
          code: `// 处理流程:\n// Controller -> Service -> Repository -> Model -> Database`,
          language: 'php'
        },
        {
          id: 'global-helpers',
          heading: '2. 全局辅助函数参考',
          text: 'Zen PHP 内置开箱即用的全局辅助函数：',
          code: `// 1. 返回 Blade 视图\nreturn view('home.index', ['title' => 'Dashboard']);\n\n// 2. 返回 React Inertia 组件\nreturn react('Pages/UserList', ['users' => $users]);\n\n// 3. 返回标准化 JSON API 响应\nreturn response()->json($data, 200, '获取成功');`,
          language: 'php'
        }
      ]
    }
  },

  'react-preset': {
    id: {
      title: 'React 18 & Inertia.js SPA Guide (v9.1.6)',
      subtitle: 'Panduan lengkap membuat Single Page Application (SPA) reaktif menggunakan React 18, Inertia.js, Vite HMR, dan TailwindCSS v4.',
      sections: [
        {
          id: 'activation',
          heading: '1. Aktivasi Preset React 18',
          text: 'Jalankan perintah Zen CLI berikut di direktori project Anda untuk mengaktifkan React Inertia Preset:',
          code: `# 1. Aktifkan preset React 18 Inertia\nphp zen preset:react\n\n# 2. Install paket npm Node.js\nnpm install\n\n# 3. Jalankan server dev gabungan\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'controller-hydration',
          heading: '2. Pengiriman Props dari Controller ke React',
          text: 'Anda dapat menggunakan sintaks Inertia::render(), helper react(), atau helper inertia():',
          code: `namespace App\\Controllers;\n\nuse App\\Core\\Controller;\nuse Inertia\\Inertia;\n\nclass ProductController extends Controller\n{\n    public function index()\n    {\n        return Inertia::render('Pages/Products/Index', [\n            'title' => 'Daftar Produk Zen PHP',\n            'products' => [\n                ['id' => 1, 'name' => 'Laptop Zen Pro', 'price' => 15000000],\n                ['id' => 2, 'name' => 'Keyboard Mechanical', 'price' => 850000]\n            ]\n        ]);\n    }\n}`,
          language: 'php'
        },
        {
          id: 'react-component',
          heading: '3. Komponen React (resources/js/Pages/Products/Index.jsx)',
          text: 'Buat komponen React modern dengan status reaktif dan dukungan Head / Link dari @inertiajs/react:',
          code: `import React, { useState } from 'react';\nimport { Head, Link } from '@inertiajs/react';\n\nexport default function ProductIndex({ title, products }) {\n  const [search, setSearch] = useState('');\n\n  const filtered = products.filter(p => \n    p.name.toLowerCase().includes(search.toLowerCase())\n  );\n\n  return (\n    <>\n      <Head title={title} />\n      <div className="min-h-screen bg-slate-950 text-white p-8 font-sans">\n        <div className="max-w-4xl mx-auto space-y-6">\n          <h1 className="text-3xl font-black text-sky-400">{title}</h1>\n          \n          <input \n            type="text" \n            placeholder="Cari produk..."\n            value={search}\n            onChange={(e) => setSearch(e.target.value)}\n            className="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-sm focus:outline-none focus:border-sky-500"\n          />\n\n          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">\n            {filtered.map(item => (\n              <div key={item.id} className="p-4 bg-slate-900 border border-slate-800 rounded-2xl flex justify-between items-center">\n                <div>\n                  <h3 className="font-bold text-slate-200">{item.name}</h3>\n                  <p className="text-xs text-slate-400">Rp {item.price.toLocaleString()}</p>\n                </div>\n                <span className="px-3 py-1 bg-sky-500/10 text-sky-400 border border-sky-500/20 rounded-full text-xs font-semibold">Tersedia</span>\n              </div>\n            ))}\n          </div>\n        </div>\n      </div>\n    </>\n  );\n}`,
          language: 'jsx'
        }
      ]
    },
    en: {
      title: 'React 18 & Inertia.js SPA Guide (v9.1.6)',
      subtitle: 'Comprehensive guide to building reactive Single Page Applications using React 18, Inertia.js, Vite HMR, and TailwindCSS v4.',
      sections: [
        {
          id: 'activation',
          heading: '1. React 18 Preset Activation',
          text: 'Run the following Zen CLI command to activate the React Inertia Preset:',
          code: `# 1. Activate React 18 Inertia preset\nphp zen preset:react\n\n# 2. Install Node dependencies\nnpm install\n\n# 3. Start concurrent dev server\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'controller-hydration',
          heading: '2. Controller Props Hydration',
          text: 'You can use Inertia::render(), react(), or inertia() helper syntax:',
          code: `namespace App\\Controllers;\n\nuse App\\Core\\Controller;\nuse Inertia\\Inertia;\n\nclass ProductController extends Controller\n{\n    public function index()\n    {\n        return Inertia::render('Pages/Products/Index', [\n            'title' => 'Zen PHP Products',\n            'products' => [\n                ['id' => 1, 'name' => 'Laptop Zen Pro', 'price' => 15000000],\n                ['id' => 2, 'name' => 'Keyboard Mechanical', 'price' => 850000]\n            ]\n        ]);\n    }\n}`,
          language: 'php'
        },
        {
          id: 'react-component',
          heading: '3. React Component Definition',
          text: 'Create modern React components with Head and Link components from @inertiajs/react:',
          code: `import React, { useState } from 'react';\nimport { Head, Link } from '@inertiajs/react';\n\nexport default function ProductIndex({ title, products }) {\n  const [search, setSearch] = useState('');\n  return (\n    <>\n      <Head title={title} />\n      <div className="p-8 bg-slate-950 text-white min-h-screen font-sans">\n        <h1 className="text-3xl font-black text-sky-400">{title}</h1>\n      </div>\n    </>\n  );\n}`,
          language: 'jsx'
        }
      ]
    },
    ja: {
      title: 'React 18 & Inertia.js SPA ガイド (v9.1.6)',
      subtitle: 'React 18、Inertia.js、Vite HMR、TailwindCSS v4 を使用したシングルページアプリケーション開発ガイド。',
      sections: [
        {
          id: 'activation',
          heading: '1. React プリセットの有効化',
          text: '以下の CLI コマンドを実行して React プリセットを有効化します:',
          code: `php zen preset:react\nnpm install\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'controller-hydration',
          heading: '2. コントローラーからのデータ受け渡し',
          text: 'Inertia::render() または helper 関数を使用します:',
          code: `return Inertia::render('Pages/Products/Index', [\n    'title' => '商品一覧',\n    'products' => $products\n]);`,
          language: 'php'
        }
      ]
    },
    zh: {
      title: 'React 18 & Inertia.js 单页应用指南 (v9.1.6)',
      subtitle: '使用 React 18、Inertia.js、Vite HMR 和 TailwindCSS v4 构建响应式单页应用的完整指南。',
      sections: [
        {
          id: 'activation',
          heading: '1. 激活 React 预设模式',
          text: '在项目根目录运行以下命令行开启 React 预设：',
          code: `php zen preset:react\nnpm install\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'controller-hydration',
          heading: '2. 控制器向 React 传参',
          text: '使用 Inertia::render() 或 react() 全局辅助函数：',
          code: `return Inertia::render('Pages/Products/Index', [\n    'title' => '产品列表',\n    'products' => $products\n]);`,
          language: 'php'
        }
      ]
    }
  },

  'pulse-preset': {
    id: {
      title: 'Zen Pulse Live Reactive Engine',
      subtitle: 'Komponen Blade reaktif berbasis server-driven tanpa perlu bundler JavaScript eksternal.',
      sections: [
        {
          id: 'activation',
          heading: '1. Aktivasi Pulse Preset',
          text: 'Aktifkan Zen Pulse Engine di project Anda:',
          code: `php zen preset:pulse\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'pulse-component',
          heading: '2. Pembuatan Komponen Reaktif (app/views/pulse/counter.php)',
          text: 'Gunakan atribut zen-click atau zen-model pada elemen HTML:',
          code: `<div class="p-6 bg-slate-900 border border-slate-800 rounded-2xl text-center">\n    <h2 class="text-3xl font-bold text-sky-400 mb-4">Counter: <?= $count ?? 0 ?></h2>\n    <button zen-click="increment" class="px-6 py-2.5 bg-sky-500 text-slate-950 font-bold rounded-xl">\n        + Tambah Counter\n    </button>\n</div>`,
          language: 'html'
        }
      ]
    },
    en: {
      title: 'Zen Pulse Live Reactive Engine',
      subtitle: 'Server-driven reactive Blade components with zero external JavaScript bundlers.',
      sections: [
        {
          id: 'activation',
          heading: '1. Pulse Preset Activation',
          text: 'Activate Zen Pulse Live Engine:',
          code: `php zen preset:pulse\ncomposer run dev`,
          language: 'bash'
        },
        {
          id: 'pulse-component',
          heading: '2. Reactive Component Definition',
          text: 'Use zen-click or zen-model attributes on HTML elements:',
          code: `<div class="p-6 bg-slate-900 border border-slate-800 rounded-2xl text-center">\n    <h2 class="text-3xl font-bold text-sky-400 mb-4">Counter: <?= $count ?? 0 ?></h2>\n    <button zen-click="increment" class="px-6 py-2.5 bg-sky-500 text-slate-950 font-bold rounded-xl">\n        + Increment Counter\n    </button>\n</div>`,
          language: 'html'
        }
      ]
    },
    ja: {
      title: 'Zen Pulse ライブリアクティブエンジン',
      subtitle: '外部 JS バンドラー不要のサーバー駆動型リアクティブ Blade コンポーネント。',
      sections: [
        {
          id: 'activation',
          heading: '1. Pulse プリセットの有効化',
          text: 'Zen Pulse を有効化します:',
          code: `php zen preset:pulse\ncomposer run dev`,
          language: 'bash'
        }
      ]
    },
    zh: {
      title: 'Zen Pulse 实时响应式引擎',
      subtitle: '无需外部 JavaScript 打包工具的服务端驱动 Blade 响应式组件。',
      sections: [
        {
          id: 'activation',
          heading: '1. 激活 Pulse 预设',
          text: '在项目中开启 Zen Pulse 引擎：',
          code: `php zen preset:pulse\ncomposer run dev`,
          language: 'bash'
        }
      ]
    }
  },

  'api-preset': {
    id: {
      title: 'Dedicated REST API & Swagger OpenAPI UI',
      subtitle: 'Mode dedicated REST API berkinerja tinggi dengan format Standard Enterprise JSON Envelope dan Swagger UI interaktif di /docs.',
      sections: [
        {
          id: 'activation',
          heading: '1. Mengaktifkan Mode Dedicated REST API',
          text: 'Jalankan perintah preset CLI untuk mengonfigurasi backend API:',
          code: `php zen preset:api`,
          language: 'bash'
        },
        {
          id: 'json-envelope',
          heading: '2. Standar Response JSON Enterprise Envelope',
          text: 'Semua response REST API otomatis dibungkus dengan skema JSON standar:',
          code: `// Response Sukses (200 OK / 201 Created)\n{\n  "status": true,\n  "success": true,\n  "message": "Data produk berhasil diambil",\n  "data": [\n    {\n      "id": 1,\n      "name": "Zen Enterprise Server",\n      "price": 2500000\n    }\n  ],\n  "meta": {\n    "page": 1,\n    "total": 100\n  }\n}\n\n// Response Error (400 Bad Request / 422 Unprocessable)\n{\n  "status": false,\n  "success": false,\n  "message": "Validasi gagal",\n  "errors": {\n    "email": ["Format email tidak valid."]\n  },\n  "code": 422\n}`,
          language: 'json'
        },
        {
          id: 'swagger-ui',
          heading: '3. Dokumen Interactive Swagger UI (/docs)',
          text: 'Buka browser di http://127.0.0.1:8000/docs untuk mengakses antarmuka interaktif Swagger OpenAPI.',
          code: `# Endpoint otomatis aktif di /docs`,
          language: 'text'
        }
      ]
    },
    en: {
      title: 'Dedicated REST API & Swagger OpenAPI UI',
      subtitle: 'High-performance Dedicated REST API Mode with Enterprise JSON Envelopes and interactive Swagger UI at /docs.',
      sections: [
        {
          id: 'activation',
          heading: '1. Dedicated REST API Activation',
          text: 'Run the CLI preset command to configure the API backend:',
          code: `php zen preset:api`,
          language: 'bash'
        },
        {
          id: 'json-envelope',
          heading: '2. Enterprise JSON Response Envelope Standard',
          text: 'All REST API endpoints automatically wrap JSON responses with standard enterprise schemas:',
          code: `{\n  "status": true,\n  "success": true,\n  "message": "Products retrieved successfully",\n  "data": [\n    {\n      "id": 1,\n      "name": "Zen Enterprise Server",\n      "price": 2500000\n    }\n  ]\n}`,
          language: 'json'
        }
      ]
    },
    ja: {
      title: '専用 REST API & Swagger UI',
      subtitle: 'エンタープライズ JSON レスポンス形式と /docs でのインタラクティブ Swagger UI を備えた REST API。',
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
      title: '专用 REST API 与 Swagger OpenAPI UI',
      subtitle: '具有标准企业级 JSON 响结构及在 /docs 提供交互式 Swagger UI 的高性能 REST API 模式。',
      sections: [
        {
          id: 'activation',
          heading: '1. 开启专用 REST API 模式',
          text: '运行以下 CLI 预设命令：',
          code: `php zen preset:api`,
          language: 'bash'
        }
      ]
    }
  },

  'authorization': {
    id: {
      title: 'Authorization & Security Engine',
      subtitle: 'Sistem otorisasi Gate & Policy tingkat enterprise dengan dukungan multi-guard authentication.',
      sections: [
        {
          id: 'gate-definition',
          heading: '1. Definisi Gate & Policy (App\\Core\\Gate)',
          text: 'Definisikan hak akses pada bootstrap aplikasi:',
          code: `use App\\Core\\Gate;\n\n// Definisi Gate Ability\nGate::define('edit-product', function ($user, $product) {\n    return $user['id'] === $product['user_id'] || ($user['role'] ?? '') === 'admin';\n});\n\n// Pemetaan Model ke Policy Class\nGate::policy(\\App\\Models\\Product::class, \\App\\Policies\\ProductPolicy::class);`,
          language: 'php'
        },
        {
          id: 'authorize-helpers',
          heading: '2. Helper Otorisasi dalam Controller',
          text: 'Gunakan helper gate() atau authorize() di controller:',
          code: `// Cek izin (returns boolean)\nif (gate()->allows('edit-product', $product)) {\n    // Lakukan edit\n}\n\n// Otorisasi langsung atau lempar Exception 403 Forbidden\nauthorize('edit-product', $product);`,
          language: 'php'
        }
      ]
    },
    en: {
      title: 'Authorization & Security Engine',
      subtitle: 'Enterprise-grade Gate & Policy authorization engine with multi-guard authentication support.',
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
      subtitle: 'マルチガード認証対応の Gate & Policy 認可システム。',
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
        },
        {
          id: 'generator-commands',
          heading: '2. Code Scaffolding Generators (make:*)',
          text: 'Generate clean architecture component files:',
          code: `php zen make:controller ProductController\nphp zen make:model Product\nphp zen make:service ProductService\nphp zen make:repository ProductRepository\nphp zen make:middleware AuthMiddleware\nphp zen make:migration create_products_table\nphp zen make:seeder ProductSeeder`,
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
          heading: '2. Contoh Kode Test (tests/Feature/ExampleTest.php)',
          text: 'Penulisan test yang ekspresif:',
          code: `test('halaman utama dapat diakses', function () {\n    $response = $this->get('/');\n    $response->assertStatus(200);\n});`,
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
          items: [
            'Mandatory Architecture: MVC + Service-Repository Pattern.',
            'Global Helper Usage: view(), react(), response(), authorize().',
            'Naming Conventions: Controller (PascalCase), Model (Singular), Repository (ModelRepository).',
            'Security: Gate & Policy authorization enforcement.'
          ],
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
