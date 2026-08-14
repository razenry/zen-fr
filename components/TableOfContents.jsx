'use client';

import React, { useState, useEffect } from 'react';
import { List, ChevronRight } from 'lucide-react';
import { useLanguage } from '../context/LanguageContext';
import { uiTranslations } from '../data/documentationData';

export default function TableOfContents({ sections = [] }) {
  const { language } = useLanguage();
  const t = uiTranslations[language] || uiTranslations.id;
  const [activeId, setActiveId] = useState('');

  useEffect(() => {
    if (!sections.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            setActiveId(entry.target.id);
          }
        });
      },
      { rootMargin: '-80px 0% -70% 0%' }
    );

    sections.forEach((sec) => {
      if (sec.id) {
        const el = document.getElementById(sec.id);
        if (el) observer.observe(el);
      }
    });

    return () => observer.disconnect();
  }, [sections]);

  if (!sections.length) return null;

  const scrollToSection = (id) => {
    const el = document.getElementById(id);
    if (el) {
      const yOffset = -90;
      const y = el.getBoundingClientRect().top + window.pageYOffset + yOffset;
      window.scrollTo({ top: y, behavior: 'smooth' });
    }
  };

  return (
    <div className="hidden xl:block w-64 shrink-0 pl-6 border-l border-slate-800/80">
      <div className="sticky top-24 space-y-3">
        <div className="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">
          <List className="h-3.5 w-3.5 text-sky-400" />
          <span>{t.onThisPage}</span>
        </div>

        <nav className="space-y-1 text-xs">
          {sections.map((sec, idx) => {
            const isActive = activeId === sec.id;
            return (
              <button
                key={sec.id || idx}
                onClick={() => scrollToSection(sec.id)}
                className={`group flex items-center justify-between w-full text-left py-1.5 px-2 rounded-lg transition ${
                  isActive
                    ? 'text-sky-400 font-semibold bg-sky-500/10 border border-sky-500/20'
                    : 'text-slate-400 hover:text-slate-200 hover:bg-slate-900/60'
                }`}
              >
                <span className="truncate">{sec.heading}</span>
                {isActive && <ChevronRight className="h-3 w-3 text-sky-400 shrink-0 ml-1" />}
              </button>
            );
          })}
        </nav>
      </div>
    </div>
  );
}
