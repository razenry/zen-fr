'use client';

import React from 'react';
import Link from 'next/link';
import { notFound, useParams } from 'next/navigation';
import CodeBlock from '../../../components/CodeBlock';
import TableOfContents from '../../../components/TableOfContents';
import { useLanguage } from '../../../context/LanguageContext';
import { uiTranslations, docsNavigation, docsDetailContent } from '../../../data/documentationData';
import { 
  ChevronRight, 
  ArrowLeft, 
  ArrowRight, 
  BookOpen, 
  Terminal, 
  CheckCircle2, 
  Layers, 
  Database,
  FileCode,
  Zap, 
  Server, 
  ShieldCheck, 
  Bot, 
  Cpu, 
  GitBranch, 
  Atom
} from 'lucide-react';

const iconMap = {
  Rocket: BookOpen,
  Cpu,
  GitBranch,
  Layers,
  Database,
  FileCode,
  Atom,
  Zap,
  Server,
  ShieldCheck,
  Terminal,
  CheckCircle: CheckCircle2,
  Bot
};

export default function DocSlugPage() {
  const params = useParams();
  const slug = params?.slug;

  const { language } = useLanguage();
  const t = uiTranslations[language] || uiTranslations.id;

  // Find navigation metadata for this slug
  const currentIndex = docsNavigation.findIndex((item) => item.slug === slug);
  if (currentIndex === -1) {
    notFound();
  }

  const currentNav = docsNavigation[currentIndex];
  const prevNav = currentIndex > 0 ? docsNavigation[currentIndex - 1] : null;
  const nextNav = currentIndex < docsNavigation.length - 1 ? docsNavigation[currentIndex + 1] : null;

  // Get localized content for this topic
  const topicContent = docsDetailContent[slug]?.[language] || docsDetailContent[slug]?.id || docsDetailContent[slug]?.en;

  if (!topicContent) {
    notFound();
  }

  const TopicIcon = iconMap[currentNav.icon] || BookOpen;
  const navTitle = currentNav.title[language] || currentNav.title.id;

  return (
    <div className="flex flex-col xl:flex-row gap-8 max-w-6xl">
      {/* Main Content Area */}
      <div className="flex-1 min-w-0 space-y-10">
        
        {/* Breadcrumb Trail */}
        <nav className="flex items-center gap-2 text-xs font-semibold text-slate-400 font-mono">
          <Link href="/" className="hover:text-white transition">
            Zen PHP
          </Link>
          <ChevronRight className="h-3 w-3 text-slate-600" />
          <span className="text-slate-500">{t.menuTitle}</span>
          <ChevronRight className="h-3 w-3 text-slate-600" />
          <span className="text-sky-400 font-bold">{navTitle}</span>
        </nav>

        {/* Topic Title Header */}
        <div className="border-b border-slate-800/80 pb-6 space-y-3">
          <div className="flex items-center gap-3">
            <div className="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20 shadow-sm">
              <TopicIcon className="h-5 w-5" />
            </div>
            <h1 className="text-3xl sm:text-4xl font-black text-white tracking-tight font-sans">
              {topicContent.title}
            </h1>
          </div>
          <p className="text-sm sm:text-base text-slate-400 leading-relaxed max-w-3xl">
            {topicContent.subtitle}
          </p>
        </div>

        {/* Dynamic Sections */}
        <div className="space-y-12">
          {topicContent.sections?.map((sec, idx) => (
            <section key={sec.id || idx} id={sec.id} className="scroll-mt-24 space-y-4">
              <h2 className="text-xl font-extrabold text-white tracking-tight flex items-center gap-2 group">
                <span className="text-sky-400 font-mono text-sm">#</span>
                <span>{sec.heading}</span>
              </h2>

              {sec.text && (
                <p className="text-xs sm:text-sm text-slate-300 leading-relaxed font-sans">
                  {sec.text}
                </p>
              )}

              {sec.items && (
                <ul className="space-y-2 py-2">
                  {sec.items.map((item, itemIdx) => (
                    <li key={itemIdx} className="flex items-start gap-2.5 text-xs sm:text-sm text-slate-300">
                      <CheckCircle2 className="h-4 w-4 text-emerald-400 shrink-0 mt-0.5" />
                      <span>{item}</span>
                    </li>
                  ))}
                </ul>
              )}

              {sec.code && (
                <CodeBlock 
                  code={sec.code} 
                  language={sec.language || 'bash'} 
                />
              )}
            </section>
          ))}
        </div>

        {/* Bottom Pagination Links (Previous & Next Page) */}
        <div className="pt-10 border-t border-slate-800/80 grid grid-cols-1 sm:grid-cols-2 gap-4 font-sans">
          {prevNav ? (
            <Link
              href={`/docs/${prevNav.slug}`}
              className="group p-4 rounded-2xl border border-slate-800/80 bg-slate-900/40 hover:bg-slate-900 hover:border-sky-500/30 transition flex flex-col justify-between"
            >
              <div className="text-[11px] font-bold uppercase tracking-wider text-slate-500 font-mono flex items-center gap-1">
                <ArrowLeft className="h-3 w-3 group-hover:-translate-x-1 transition" />
                <span>{t.previousPage}</span>
              </div>
              <div className="text-sm font-bold text-slate-200 group-hover:text-sky-400 transition mt-1">
                {prevNav.title[language] || prevNav.title.id}
              </div>
            </Link>
          ) : (
            <div />
          )}

          {nextNav ? (
            <Link
              href={`/docs/${nextNav.slug}`}
              className="group p-4 rounded-2xl border border-slate-800/80 bg-slate-900/40 hover:bg-slate-900 hover:border-sky-500/30 transition flex flex-col justify-end text-right sm:col-start-2"
            >
              <div className="text-[11px] font-bold uppercase tracking-wider text-slate-500 font-mono flex items-center justify-end gap-1">
                <span>{t.nextPage}</span>
                <ArrowRight className="h-3 w-3 group-hover:translate-x-1 transition" />
              </div>
              <div className="text-sm font-bold text-slate-200 group-hover:text-sky-400 transition mt-1">
                {nextNav.title[language] || nextNav.title.id}
              </div>
            </Link>
          ) : (
            <div />
          )}
        </div>

      </div>

      {/* Right Table of Contents Sidebar */}
      <TableOfContents sections={topicContent.sections || []} />
    </div>
  );
}
