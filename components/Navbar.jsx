import React from 'react';
import Link from 'next/link';
import { ExternalLink, Github, Zap, BookOpen } from 'lucide-react';

export default function Navbar() {
  return (
    <header className="sticky top-0 z-50 w-full border-b border-slate-800/80 bg-slate-950/80 backdrop-blur-xl">
      <div className="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <div className="flex items-center gap-4">
          <Link href="/" className="flex items-center gap-3 transition hover:opacity-90">
            <div className="flex h-10 w-10 items-center justify-center rounded-xl border border-sky-500/20 bg-sky-500/10 text-sky-400 shadow-inner">
              <Zap className="h-5 w-5 fill-sky-400/20" />
            </div>
            <div>
              <span className="text-lg font-black tracking-tight text-white">
                Zen <span className="text-sky-400">PHP</span>
              </span>
              <span className="ml-2.5 rounded-full border border-sky-500/30 bg-sky-500/10 px-2 py-0.5 text-[10px] font-bold font-mono text-sky-400">
                v9.1.6
              </span>
            </div>
          </Link>
        </div>

        <div className="flex items-center gap-3">
          <Link
            href="/docs/getting-started"
            className="hidden sm:inline-flex items-center gap-2 rounded-xl bg-slate-900 border border-slate-800 px-3.5 py-1.5 text-xs font-semibold text-slate-300 hover:border-slate-700 hover:text-white transition"
          >
            <BookOpen className="h-3.5 w-3.5 text-sky-400" />
            <span>Dokumentasi</span>
          </Link>

          <a
            href="https://github.com/razenry/zen-fr"
            target="_blank"
            rel="noopener noreferrer"
            className="flex items-center gap-2 rounded-xl bg-slate-900 border border-slate-800 px-3.5 py-1.5 text-xs font-semibold text-slate-300 hover:border-slate-700 hover:text-white transition"
          >
            <Github className="h-4 w-4" />
            <span className="hidden sm:inline">GitHub</span>
            <ExternalLink className="h-3 w-3 opacity-60" />
          </a>

          <div className="hidden md:flex items-center gap-1.5 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3 py-1 text-[11px] font-semibold text-emerald-400">
            <span className="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>Vercel Ready</span>
          </div>
        </div>
      </div>
    </header>
  );
}
