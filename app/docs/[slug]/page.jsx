import React from 'react';
import CodeBlock from '../../../components/CodeBlock';
import { notFound } from 'next/navigation';
import { BookOpen, CheckCircle, Terminal, Layers, Zap, Server, ShieldCheck, Bot } from 'lucide-react';

const docsContent = {
  'getting-started': {
    title: 'Getting Started & Setup (v9.1.6)',
    subtitle: 'Panduan lengkap penginstalan, struktur folder, dan pengoperasian Zen PHP Framework.',
    icon: BookOpen,
    sections: [
      {
        heading: '1. Persyaratan Sistem',
        text: 'Zen PHP Framework membutuhkan PHP >= 8.0 dan Composer terinstall pada komputer/server Anda.',
        code: `php -v\ncomposer --version`,
        language: 'bash'
      },
      {
        heading: '2. Membuat Project Baru',
        text: 'Jalankan perintah composer create-project untuk membuat skafel aplikasi baru:',
        code: `composer create-project razenry/zen-php my-project\ncd my-project`,
        language: 'bash'
      },
      {
        heading: '3. Menjalankan Server Development',
        text: 'Jalankan dev runner gabungan yang menyalakan PHP server di port 8000 dan Vite HMR server di port 5173:',
        code: `composer run dev`,
        language: 'bash'
      }
    ]
  },

  'react-preset': {
    title: 'React 18 & Inertia.js SPA Guide',
    subtitle: 'Panduan arsitektur Single Page Application menggunakan React 18, Inertia.js, Vite HMR, dan TailwindCSS v4.',
    icon: Layers,
    sections: [
      {
        heading: '1. Aktivasi Preset React Inertia',
        text: 'Jalankan perintah preset CLI untuk mengonfigurasi React 18 & Inertia.js:',
        code: `php zen preset:react\nnpm install\ncomposer run dev`,
        language: 'bash'
      },
      {
        heading: '2. Mengirim Data dari Controller via Inertia',
        text: 'Gunakan sintaks Laravel Inertia atau helper inertia() pada controller Anda:',
        code: `namespace App\\Controllers;\n\nuse App\\Core\\Controller;\nuse Inertia\\Inertia;\n\nclass HomeController extends Controller\n{\n    public function index()\n    {\n        return Inertia::render('Pages/Dashboard', [\n            'title' => 'Zen React 18 Dashboard',\n            'user'  => ['name' => 'Alice', 'role' => 'Admin']\n        ]);\n    }\n}`,
        language: 'php'
      },
      {
        heading: '3. Definisi Komponen React (resources/js/Pages/Dashboard.jsx)',
        text: 'Buat komponen React dengan komponen <Head /> bawaan @inertiajs/react:',
        code: `import React, { useState } from 'react';\nimport { Head } from '@inertiajs/react';\n\nexport default function Dashboard({ title, user }) {\n  const [count, setCount] = useState(0);\n  return (\n    <>\n      <Head title={title} />\n      <div className="p-8 bg-slate-950 text-white min-h-screen font-sans">\n        <h1 className="text-3xl font-black text-sky-400">{title}</h1>\n        <p className="text-slate-400">Selamat datang, {user.name}</p>\n        <button onClick={() => setCount(count + 1)} className="mt-4 px-4 py-2 bg-sky-500 rounded-xl text-slate-950 font-bold">\n          Count: {count}\n        </button>\n      </div>\n    </>\n  );\n}`,
        language: 'jsx'
      }
    ]
  },

  'pulse-preset': {
    title: 'Zen Pulse Live Reactive Engine',
    subtitle: 'Engine reaktif fullstack tanpa JavaScript eksternal untuk Blade PHP views.',
    icon: Zap,
    sections: [
      {
        heading: '1. Aktivasi Preset Zen Pulse',
        text: 'Jalankan perintah CLI preset:pulse:',
        code: `php zen preset:pulse\ncomposer run dev`,
        language: 'bash'
      },
      {
        heading: '2. Penggunaan Directive Reaktif pada View',
        text: 'Gunakan zen-click dan zen-model untuk menangani state interaktif secara real-time:',
        code: `<div zen-component="Counter">\n  <button zen-click="increment">+ Add</button>\n  <input zen-model="search" placeholder="Cari..." />\n</div>`,
        language: 'html'
      }
    ]
  },

  'api-preset': {
    title: 'Dedicated REST API & Swagger Documentation',
    subtitle: 'Mode REST API murni dengan Swagger UI otomatis dan Bearer Token Authentication.',
    icon: Server,
    sections: [
      {
        heading: '1. Aktivasi Preset REST API Only',
        text: 'Jalankan perintah preset:api:',
        code: `php zen preset:api\ncomposer run dev`,
        language: 'bash'
      },
      {
        heading: '2. Mengakses Dokumentasi Swagger UI',
        text: 'Buka browser di http://127.0.0.1:8000/docs untuk membuka OpenAPI Interactive Docs.',
        code: `HTTP GET http://127.0.0.1:8000/docs`,
        language: 'http'
      }
    ]
  },

  'authorization': {
    title: 'Authorization, Gates & Policies',
    subtitle: 'Sistem otorisasi keamanan berbasis Role, Gate Abilities, dan Policy Classes.',
    icon: ShieldCheck,
    sections: [
      {
        heading: '1. Mendefinisikan Gate Ability',
        text: 'Daftarkan kemampuan otorisasi menggunakan helper gate():',
        code: `gate()->define('edit-product', function($user, $product) {\n    return $user->id === $product->user_id;\n});`,
        language: 'php'
      },
      {
        heading: '2. Otorisasi pada Controller',
        text: 'Jalankan authorize() di dalam controller method:',
        code: `authorize('edit-product', $product); // Throws 403 HTTP Exception if denied`,
        language: 'php'
      }
    ]
  },

  'ai-agents': {
    title: 'AI Coding Assistant Handbook (AGENTS.md)',
    subtitle: 'Pedoman konvensi arsitektur dan rulebook untuk AI coding assistants (Antigravity/Gemini).',
    icon: Bot,
    sections: [
      {
        heading: '1. Aturan Kode AI Agent',
        text: 'Selalu gunakan Route::get() / Route::post() dan konsisten menerapkan Service-Repository Pattern.',
        code: `use App\\Core\\Route;\nuse App\\Controllers\\ProductController;\n\nRoute::get('/products', [ProductController::class, 'index'])->name('products.index');`,
        language: 'php'
      }
    ]
  }
};

export function generateStaticParams() {
  return Object.keys(docsContent).map((slug) => ({ slug }));
}

export default function DocPage({ params }) {
  const doc = docsContent[params.slug];

  if (!doc) {
    notFound();
  }

  const Icon = doc.icon;

  return (
    <div className="space-y-8">
      {/* Header */}
      <div className="border-b border-slate-800 pb-6">
        <div className="flex items-center gap-3 text-sky-400 mb-2">
          <Icon className="h-6 w-6" />
          <span className="text-xs font-bold font-mono uppercase tracking-widest">Dokumentasi Resmi Zen PHP</span>
        </div>
        <h1 className="text-3xl font-black text-white mb-2">{doc.title}</h1>
        <p className="text-slate-400 text-sm">{doc.subtitle}</p>
      </div>

      {/* Sections */}
      <div className="space-y-8">
        {doc.sections.map((section, idx) => (
          <div key={idx} className="space-y-3">
            <h2 className="text-lg font-bold text-white flex items-center gap-2">
              <CheckCircle className="h-4 w-4 text-sky-400" />
              <span>{section.heading}</span>
            </h2>
            <p className="text-xs text-slate-400 leading-relaxed">{section.text}</p>
            <CodeBlock code={section.code} language={section.language} />
          </div>
        ))}
      </div>
    </div>
  );
}
