'use client';

import React from 'react';
import Link from 'next/link';
import { usePathname } from 'next/navigation';
import { 
  Rocket, 
  Cpu, 
  GitBranch, 
  Layers, 
  Atom, 
  Zap, 
  Server, 
  ShieldCheck, 
  Terminal, 
  CheckCircle, 
  Bot, 
  Home, 
  ChevronRight,
  BookOpen
} from 'lucide-react';
import { useLanguage } from '../context/LanguageContext';
import { uiTranslations, docsNavigation } from '../data/documentationData';

const iconMap = {
  Home,
  Rocket,
  Cpu,
  GitBranch,
  Layers,
  Atom,
  Zap,
  Server,
  ShieldCheck,
  Terminal,
  CheckCircle,
  Bot
};

export default function Sidebar({ isMobileOpen, onCloseMobile }) {
  const pathname = usePathname();
  const { language } = useLanguage();
  const t = uiTranslations[language] || uiTranslations.id;

  const sidebarContent = (
    <aside className="w-full md:w-64 shrink-0 p-4 font-sans">
      <div className="mb-3 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500 font-mono flex items-center justify-between">
        <span>{t.menuTitle}</span>
        <span className="text-[10px] text-sky-400 bg-sky-500/10 px-1.5 py-0.5 rounded border border-sky-500/20 font-bold">
          11 Topic
        </span>
      </div>

      <nav className="space-y-1">
        {/* Overview link */}
        <Link
          href="/"
          onClick={onCloseMobile}
          className={`flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition ${
            pathname === '/'
              ? 'bg-sky-500/10 text-sky-400 border border-sky-500/20 shadow-sm'
              : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200'
          }`}
        >
          <div className="flex items-center gap-3 min-w-0">
            <Home className={`h-4 w-4 ${pathname === '/' ? 'text-sky-400' : 'text-slate-500'}`} />
            <span className="truncate">
              {language === 'id' ? 'Ringkasan Framework' : language === 'ja' ? '概要' : language === 'zh' ? '框架概述' : 'Framework Overview'}
            </span>
          </div>
          {pathname === '/' && <ChevronRight className="h-3.5 w-3.5 text-sky-400 shrink-0" />}
        </Link>

        {/* Dynamic documentation topics */}
        {docsNavigation.map((item) => {
          const href = `/docs/${item.slug}`;
          const isActive = pathname === href;
          const IconComponent = iconMap[item.icon] || BookOpen;
          const title = item.title[language] || item.title.id;

          return (
            <Link
              key={item.slug}
              href={href}
              onClick={onCloseMobile}
              className={`flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition ${
                isActive
                  ? 'bg-sky-500/10 text-sky-400 border border-sky-500/20 shadow-sm'
                  : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200'
              }`}
            >
              <div className="flex items-center gap-3 min-w-0">
                <IconComponent className={`h-4 w-4 shrink-0 ${isActive ? 'text-sky-400' : 'text-slate-500'}`} />
                <span className="truncate">{title}</span>
              </div>
              {isActive && <ChevronRight className="h-3.5 w-3.5 text-sky-400 shrink-0 ml-1" />}
            </Link>
          );
        })}
      </nav>

      <div className="mt-8 rounded-2xl border border-slate-800/80 bg-slate-900/60 p-4 text-xs text-slate-400 backdrop-blur-xl">
        <div className="font-bold text-slate-200 mb-1 flex items-center justify-between">
          <span>Version Standard</span>
          <span className="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
        </div>
        <div className="flex items-center gap-2 text-sky-400 font-mono text-[11px] font-bold">
          <span>razenry/zen-php:^9.1.6</span>
        </div>
      </div>
    </aside>
  );

  return (
    <>
      {/* Desktop Sticky Sidebar */}
      <div className="hidden md:block border-r border-slate-800/80 bg-slate-950/40 md:min-h-[calc(100vh-4rem)]">
        {sidebarContent}
      </div>

      {/* Mobile Drawer Overlay */}
      {isMobileOpen && (
        <div className="fixed inset-0 z-50 md:hidden flex">
          <div className="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" onClick={onCloseMobile} />
          <div className="relative w-72 max-w-[80vw] bg-slate-950 border-r border-slate-800 h-full overflow-y-auto z-10 p-2">
            {sidebarContent}
          </div>
        </div>
      )}
    </>
  );
}
