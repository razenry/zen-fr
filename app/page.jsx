'use client';

import React from 'react';
import Link from 'next/link';
import CodeBlock from '../components/CodeBlock';
import { useLanguage } from '../context/LanguageContext';
import { uiTranslations, docsNavigation } from '../data/documentationData';
import { 
  Zap, 
  Layers, 
  Server, 
  ShieldCheck, 
  Terminal, 
  Rocket, 
  CheckCircle2, 
  ArrowRight, 
  Cpu, 
  Sparkles,
  Globe
} from 'lucide-react';

export default function HomePage() {
  const { language } = useLanguage();
  const t = uiTranslations[language] || uiTranslations.id;

  return (
    <div className="space-y-12 max-w-5xl">
      {/* Next.js Inspired Hero Section */}
      <div className="relative overflow-hidden rounded-3xl border border-slate-800/80 bg-gradient-to-b from-slate-900/90 to-slate-950/80 p-8 sm:p-12 shadow-2xl backdrop-blur-2xl">
        <div className="absolute -top-32 -left-32 h-80 w-80 rounded-full bg-sky-500/10 blur-3xl pointer-events-none"></div>
        <div className="absolute -bottom-32 -right-32 h-80 w-80 rounded-full bg-emerald-500/10 blur-3xl pointer-events-none"></div>

        <div className="inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-3.5 py-1 text-xs font-semibold text-sky-400 mb-6 shadow-sm">
          <Zap className="h-3.5 w-3.5" />
          <span>{t.versionBadge} — Service-Repository Pattern Ready</span>
        </div>

        <h1 className="text-4xl sm:text-6xl font-black tracking-tight text-white mb-6 font-sans leading-tight">
          {t.docsTitle}
        </h1>

        <p className="max-w-3xl text-slate-400 text-base sm:text-lg leading-relaxed mb-8 font-sans">
          {t.docsSubtitle}
        </p>

        <div className="flex flex-wrap items-center gap-4">
          <Link
            href="/docs/getting-started"
            className="inline-flex items-center gap-2 rounded-xl bg-sky-500 px-6 py-3 text-xs font-extrabold text-slate-950 shadow-lg shadow-sky-500/25 hover:bg-sky-400 transition"
          >
            <Rocket className="h-4 w-4" />
            <span>{t.quickStart}</span>
            <ArrowRight className="h-3.5 w-3.5 ml-1" />
          </Link>

          <Link
            href="/docs/react-preset"
            className="inline-flex items-center gap-2 rounded-xl bg-slate-900 border border-slate-700/80 px-6 py-3 text-xs font-bold text-slate-200 hover:bg-slate-800 hover:border-slate-600 transition"
          >
            <Layers className="h-4 w-4 text-sky-400" />
            <span>{t.reactGuide}</span>
          </Link>
        </div>
      </div>

      {/* Quick Installation Shell */}
      <div className="space-y-4">
        <div className="flex items-center justify-between">
          <h2 className="text-xl font-black tracking-tight text-white flex items-center gap-2.5">
            <Terminal className="h-5 w-5 text-sky-400" />
            <span>{t.quickInstall}</span>
          </h2>
          <span className="text-xs text-slate-500 font-mono">Composer v2 Ready</span>
        </div>

        <CodeBlock
          code={`# Buat project baru dari rilis v9.1.6\ncomposer create-project razenry/zen-php my-app\n\ncd my-app\n\n# Aktifkan preset pilihan (React 18 / Zen Pulse / REST API)\nphp zen preset:react\n\n# Install paket Node & jalankan server dev gabungan\nnpm install\ncomposer run dev`}
          language="bash"
        />
      </div>

      {/* 3 Starter Presets Feature Cards */}
      <div className="space-y-6">
        <h2 className="text-2xl font-black tracking-tight text-white flex items-center gap-2.5">
          <Sparkles className="h-5 w-5 text-sky-400" />
          <span>3 Starter Presets (`php zen preset:&lt;mode&gt;`)</span>
        </h2>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div className="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 space-y-4 flex flex-col justify-between hover:border-sky-500/40 transition">
            <div>
              <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20 mb-4">
                <Layers className="h-5 w-5" />
              </div>
              <h3 className="text-lg font-bold text-white mb-2">{t.presetReactTitle}</h3>
              <p className="text-xs text-slate-400 leading-relaxed mb-4">
                {t.presetReactDesc}
              </p>
              <div className="font-mono text-[11px] text-sky-400 bg-slate-950 p-2 rounded-lg border border-slate-800">
                php zen preset:react
              </div>
            </div>
            <Link
              href="/docs/react-preset"
              className="text-xs font-bold text-sky-400 hover:text-sky-300 flex items-center gap-1 mt-2"
            >
              <span>Pelajari React Preset</span>
              <ArrowRight className="h-3 w-3" />
            </Link>
          </div>

          <div className="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 space-y-4 flex flex-col justify-between hover:border-emerald-500/40 transition">
            <div>
              <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 mb-4">
                <Zap className="h-5 w-5" />
              </div>
              <h3 className="text-lg font-bold text-white mb-2">{t.presetPulseTitle}</h3>
              <p className="text-xs text-slate-400 leading-relaxed mb-4">
                {t.presetPulseDesc}
              </p>
              <div className="font-mono text-[11px] text-emerald-400 bg-slate-950 p-2 rounded-lg border border-slate-800">
                php zen preset:pulse
              </div>
            </div>
            <Link
              href="/docs/pulse-preset"
              className="text-xs font-bold text-emerald-400 hover:text-emerald-300 flex items-center gap-1 mt-2"
            >
              <span>Pelajari Zen Pulse</span>
              <ArrowRight className="h-3 w-3" />
            </Link>
          </div>

          <div className="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 space-y-4 flex flex-col justify-between hover:border-purple-500/40 transition">
            <div>
              <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/20 mb-4">
                <Server className="h-5 w-5" />
              </div>
              <h3 className="text-lg font-bold text-white mb-2">{t.presetApiTitle}</h3>
              <p className="text-xs text-slate-400 leading-relaxed mb-4">
                {t.presetApiDesc}
              </p>
              <div className="font-mono text-[11px] text-purple-400 bg-slate-950 p-2 rounded-lg border border-slate-800">
                php zen preset:api
              </div>
            </div>
            <Link
              href="/docs/api-preset"
              className="text-xs font-bold text-purple-400 hover:text-purple-300 flex items-center gap-1 mt-2"
            >
              <span>Pelajari Dedicated REST API</span>
              <ArrowRight className="h-3 w-3" />
            </Link>
          </div>
        </div>
      </div>

      {/* Grid of Documentation Topics */}
      <div className="space-y-6 pt-4">
        <h2 className="text-2xl font-black tracking-tight text-white flex items-center gap-2.5">
          <Globe className="h-5 w-5 text-sky-400" />
          <span>Topik Dokumentasi Lengkap</span>
        </h2>

        <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
          {docsNavigation.map((item) => {
            const title = item.title[language] || item.title.id;
            const desc = item.description[language] || item.description.id;

            return (
              <Link
                key={item.slug}
                href={`/docs/${item.slug}`}
                className="group p-5 rounded-2xl border border-slate-800/80 bg-slate-900/30 hover:bg-slate-900/80 hover:border-sky-500/30 transition flex flex-col justify-between space-y-2"
              >
                <div>
                  <h3 className="text-sm font-bold text-white group-hover:text-sky-400 transition flex items-center justify-between">
                    <span>{title}</span>
                    <ArrowRight className="h-4 w-4 text-slate-600 group-hover:text-sky-400 group-hover:translate-x-1 transition" />
                  </h3>
                  <p className="text-xs text-slate-400 mt-1 leading-relaxed line-clamp-2">
                    {desc}
                  </p>
                </div>
              </Link>
            );
          })}
        </div>
      </div>
    </div>
  );
}
