'use client';

import React from 'react';
import Link from 'next/link';
import { usePathname } from 'next/navigation';
import { 
  Rocket, 
  Layers, 
  Zap, 
  Server, 
  ShieldCheck, 
  Bot, 
  Home,
  ChevronRight 
} from 'lucide-react';

const navigation = [
  { name: 'Ringkasan Framework', href: '/', icon: Home },
  { name: 'Getting Started & Setup', href: '/docs/getting-started', icon: Rocket },
  { name: 'React 18 & Inertia.js SPA', href: '/docs/react-preset', icon: Layers },
  { name: 'Zen Pulse Live Reactive', href: '/docs/pulse-preset', icon: Zap },
  { name: 'Dedicated REST API & Docs', href: '/docs/api-preset', icon: Server },
  { name: 'Authorization & Gates', href: '/docs/authorization', icon: ShieldCheck },
  { name: 'AI Assistant Handbook', href: '/docs/ai-agents', icon: Bot },
];

export default function Sidebar() {
  const pathname = usePathname();

  return (
    <aside className="w-full md:w-64 shrink-0 border-r border-slate-800/80 bg-slate-950/40 p-4 md:min-h-[calc(100vh-4rem)]">
      <div className="mb-4 px-3 text-[11px] font-bold uppercase tracking-widest text-slate-500 font-mono">
        Menu Dokumentasi
      </div>

      <nav className="space-y-1">
        {navigation.map((item) => {
          const isActive = pathname === item.href;
          const Icon = item.icon;

          return (
            <Link
              key={item.href}
              href={item.href}
              className={`flex items-center justify-between rounded-xl px-3 py-2.5 text-xs font-semibold transition ${
                isActive
                  ? 'bg-sky-500/10 text-sky-400 border border-sky-500/20 shadow-sm'
                  : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200'
              }`}
            >
              <div className="flex items-center gap-3">
                <Icon className={`h-4 w-4 ${isActive ? 'text-sky-400' : 'text-slate-500'}`} />
                <span>{item.name}</span>
              </div>
              {isActive && <ChevronRight className="h-3.5 w-3.5 text-sky-400" />}
            </Link>
          );
        })}
      </nav>

      <div className="mt-8 rounded-2xl border border-slate-800/80 bg-slate-900/60 p-4 text-xs text-slate-400 backdrop-blur-xl">
        <div className="font-bold text-slate-200 mb-1">Versi Rilis Framework</div>
        <div className="flex items-center gap-2 text-sky-400 font-mono text-[11px] font-bold">
          <span>razenry/zen-php:^9.1.6</span>
        </div>
        <p className="mt-2 text-[11px] text-slate-500 leading-relaxed">
          Dokumentasi ini dikembangkan dengan Next.js 14 dan siap di-deploy ke Vercel.
        </p>
      </div>
    </aside>
  );
}
