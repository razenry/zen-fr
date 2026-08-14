import React from 'react';
import Link from 'next/link';
import CodeBlock from '../components/CodeBlock';
import { Zap, Layers, Server, ShieldCheck, Terminal, Rocket, CheckCircle2 } from 'lucide-react';

export default function HomePage() {
  return (
    <div className="space-y-10">
      {/* Hero Section */}
      <div className="relative overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/60 p-8 md:p-12 shadow-2xl backdrop-blur-xl">
        <div className="absolute -top-24 -left-24 h-64 w-64 rounded-full bg-sky-500/10 blur-3xl pointer-events-none"></div>
        <div className="absolute -bottom-24 -right-24 h-64 w-64 rounded-full bg-emerald-500/10 blur-3xl pointer-events-none"></div>

        <div className="inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-3 py-1 text-xs font-semibold text-sky-400 mb-6">
          <Zap className="h-3.5 w-3.5" />
          <span>Major Release v9.1.6 — Inertia.js React 18 Ready</span>
        </div>

        <h1 className="text-4xl sm:text-5xl font-black tracking-tight text-white mb-4">
          Zen <span className="text-sky-400">PHP Framework</span>
        </h1>
        <p className="max-w-2xl text-slate-400 text-sm sm:text-base leading-relaxed mb-8">
          Framework PHP super cepat, ringan, dan modern berbasis <strong className="text-white">Service-Repository Pattern</strong>. Terintegrasi penuh dengan <strong className="text-sky-400">Inertia.js React 18 SPA</strong>, <strong className="text-emerald-400">Zen Pulse Live Reactive Engine</strong>, dan <strong className="text-amber-400">Dedicated REST API</strong>.
        </p>

        <div className="flex flex-wrap gap-4">
          <Link
            href="/docs/getting-started"
            className="inline-flex items-center gap-2 rounded-xl bg-sky-500 px-6 py-3 text-xs font-black text-slate-950 shadow-lg shadow-sky-500/20 hover:bg-sky-400 transition"
          >
            <Rocket className="h-4 w-4" />
            <span>Mulai Sekarang</span>
          </Link>
          <Link
            href="/docs/react-preset"
            className="inline-flex items-center gap-2 rounded-xl bg-slate-800 border border-slate-700 px-6 py-3 text-xs font-bold text-slate-200 hover:bg-slate-700 transition"
          >
            <Layers className="h-4 w-4 text-sky-400" />
            <span>Panduan React Inertia</span>
          </Link>
        </div>
      </div>

      {/* Installation Quick Command */}
      <div className="space-y-4">
        <h2 className="text-xl font-black tracking-tight text-white flex items-center gap-2">
          <Terminal className="h-5 w-5 text-sky-400" />
          <span>Instalasi Cepat via Composer</span>
        </h2>
        <CodeBlock
          code={`# Buat project baru dari rilis v9.1.6\ncomposer create-project razenry/zen-php my-app\n\ncd my-app\n\n# Aktifkan preset React Inertia SPA\nphp zen preset:react\n\n# Install paket Node & jalankan server dev gabungan\nnpm install\ncomposer run dev`}
          language="bash"
        />
      </div>

      {/* Preset Features Grid */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div className="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 space-y-3">
          <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20">
            <Layers className="h-5 w-5" />
          </div>
          <h3 className="text-lg font-bold text-white">React 18 & Inertia.js</h3>
          <p className="text-xs text-slate-400 leading-relaxed">
            Arsitektur SPA tanpa full page reload menggunakan <code>Inertia::render()</code> dan <code>@inertiajs/react</code>.
          </p>
        </div>

        <div className="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 space-y-3">
          <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
            <Zap className="h-5 w-5" />
          </div>
          <h3 className="text-lg font-bold text-white">Zen Pulse Reactive</h3>
          <p className="text-xs text-slate-400 leading-relaxed">
            Engine reaktif server-side Blade tanpa JavaScript eksternal via <code>zen-click</code> dan <code>zen-model</code>.
          </p>
        </div>

        <div className="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 space-y-3">
          <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20">
            <Server className="h-5 w-5" />
          </div>
          <h3 className="text-lg font-bold text-white">REST API & Swagger</h3>
          <p className="text-xs text-slate-400 leading-relaxed">
            Mode REST API murni lengkap dengan dokumentasi OpenAPI Swagger UI di <code>/docs</code> dan Bearer Auth Token.
          </p>
        </div>
      </div>
    </div>
  );
}
