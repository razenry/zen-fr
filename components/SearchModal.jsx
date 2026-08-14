'use client';

import React, { useState, useEffect, useRef } from 'react';
import { useRouter } from 'next/navigation';
import { Search, X, ChevronRight, FileText, Code2, ArrowRight } from 'lucide-react';
import { useLanguage } from '../context/LanguageContext';
import { uiTranslations, docsNavigation, docsDetailContent } from '../data/documentationData';

export default function SearchModal({ isOpen, onClose }) {
  const { language } = useLanguage();
  const t = uiTranslations[language] || uiTranslations.id;
  const router = useRouter();

  const [query, setQuery] = useState('');
  const [selectedIndex, setSelectedIndex] = useState(0);
  const inputRef = useRef(null);

  useEffect(() => {
    if (isOpen) {
      setTimeout(() => inputRef.current?.focus(), 50);
      setQuery('');
      setSelectedIndex(0);
    }
  }, [isOpen]);

  useEffect(() => {
    const handleKeyDown = (e) => {
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
        e.preventDefault();
        if (isOpen) {
          onClose();
        } else {
          // Send signal or trigger close/open
          window.dispatchEvent(new CustomEvent('open-zen-search'));
        }
      }
      if (e.key === 'Escape' && isOpen) {
        onClose();
      }
    };

    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, [isOpen, onClose]);

  if (!isOpen) return null;

  // Perform search across all documentation items
  const results = [];
  const trimmedQuery = query.toLowerCase().trim();

  if (trimmedQuery.length > 0) {
    docsNavigation.forEach((nav) => {
      const title = nav.title[language] || nav.title.id || nav.title.en;
      const desc = nav.description[language] || nav.description.id || nav.description.en;
      const detail = docsDetailContent[nav.slug]?.[language] || docsDetailContent[nav.slug]?.id || docsDetailContent[nav.slug]?.en;

      let isTopicMatch = title.toLowerCase().includes(trimmedQuery) || desc.toLowerCase().includes(trimmedQuery);

      if (isTopicMatch) {
        results.push({
          type: 'topic',
          slug: nav.slug,
          href: `/docs/${nav.slug}`,
          title: title,
          snippet: desc,
          badge: 'Topic'
        });
      }

      if (detail && detail.sections) {
        detail.sections.forEach((sec) => {
          const secHeading = sec.heading || '';
          const secText = sec.text || '';
          const secCode = sec.code || '';

          if (
            secHeading.toLowerCase().includes(trimmedQuery) ||
            secText.toLowerCase().includes(trimmedQuery) ||
            secCode.toLowerCase().includes(trimmedQuery)
          ) {
            results.push({
              type: 'section',
              slug: nav.slug,
              sectionId: sec.id,
              href: `/docs/${nav.slug}#${sec.id || ''}`,
              title: `${title} → ${secHeading}`,
              snippet: secText.length > 120 ? secText.slice(0, 120) + '...' : secText,
              badge: secCode.toLowerCase().includes(trimmedQuery) ? 'Code' : 'Section'
            });
          }
        });
      }
    });
  } else {
    // Show top recommended quick links when query is empty
    docsNavigation.slice(0, 5).forEach((nav) => {
      const title = nav.title[language] || nav.title.id;
      const desc = nav.description[language] || nav.description.id;
      results.push({
        type: 'topic',
        slug: nav.slug,
        href: `/docs/${nav.slug}`,
        title: title,
        snippet: desc,
        badge: 'Recommended'
      });
    });
  }

  const handleSelect = (item) => {
    router.push(item.href);
    onClose();
  };

  const handleKeyDownInput = (e) => {
    if (e.key === 'ArrowDown') {
      e.preventDefault();
      setSelectedIndex((prev) => (prev < results.length - 1 ? prev + 1 : 0));
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      setSelectedIndex((prev) => (prev > 0 ? prev - 1 : results.length - 1));
    } else if (e.key === 'Enter') {
      e.preventDefault();
      if (results[selectedIndex]) {
        handleSelect(results[selectedIndex]);
      }
    }
  };

  return (
    <div className="fixed inset-0 z-50 flex items-start justify-center pt-16 sm:pt-24 px-4 bg-slate-950/80 backdrop-blur-md animate-fadeIn">
      <div 
        className="fixed inset-0" 
        onClick={onClose}
      />

      <div className="relative w-full max-w-2xl overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-2xl z-10 transition-all">
        {/* Search Input Bar */}
        <div className="flex items-center border-b border-slate-800 px-4 py-3 bg-slate-950/50">
          <Search className="h-5 w-5 text-sky-400 shrink-0 mr-3" />
          <input
            ref={inputRef}
            type="text"
            value={query}
            onChange={(e) => {
              setQuery(e.target.value);
              setSelectedIndex(0);
            }}
            onKeyDown={handleKeyDownInput}
            placeholder={t.searchPlaceholder}
            className="w-full bg-transparent text-sm sm:text-base text-white placeholder-slate-500 focus:outline-none"
          />
          {query && (
            <button 
              onClick={() => setQuery('')}
              className="p-1 rounded-lg hover:bg-slate-800 text-slate-400 hover:text-white mr-2"
            >
              <X className="h-4 w-4" />
            </button>
          )}
          <kbd className="hidden sm:inline-block rounded border border-slate-700 bg-slate-800 px-2 py-0.5 text-[10px] font-mono font-semibold text-slate-400">
            ESC
          </kbd>
        </div>

        {/* Search Results List */}
        <div className="max-h-[60vh] overflow-y-auto p-3 space-y-1">
          {results.length > 0 ? (
            results.map((item, idx) => {
              const isSelected = idx === selectedIndex;
              return (
                <div
                  key={`${item.href}-${idx}`}
                  onClick={() => handleSelect(item)}
                  onMouseEnter={() => setSelectedIndex(idx)}
                  className={`flex items-center justify-between rounded-xl px-3.5 py-3 cursor-pointer transition ${
                    isSelected
                      ? 'bg-sky-500/10 border border-sky-500/30 text-white shadow-sm'
                      : 'hover:bg-slate-800/60 text-slate-300'
                  }`}
                >
                  <div className="flex items-start gap-3 min-w-0">
                    <div className={`p-2 rounded-lg shrink-0 mt-0.5 ${isSelected ? 'bg-sky-500/20 text-sky-400' : 'bg-slate-800 text-slate-400'}`}>
                      {item.badge === 'Code' ? <Code2 className="h-4 w-4" /> : <FileText className="h-4 w-4" />}
                    </div>
                    <div className="min-w-0">
                      <div className="flex items-center gap-2">
                        <span className={`text-xs font-bold truncate ${isSelected ? 'text-sky-400' : 'text-slate-200'}`}>
                          {item.title}
                        </span>
                        <span className="rounded-full border border-slate-700 bg-slate-800/80 px-2 py-0.5 text-[9px] font-semibold text-slate-400">
                          {item.badge}
                        </span>
                      </div>
                      {item.snippet && (
                        <p className="text-[11px] text-slate-400 truncate mt-0.5">
                          {item.snippet}
                        </p>
                      )}
                    </div>
                  </div>
                  <ChevronRight className={`h-4 w-4 shrink-0 ${isSelected ? 'text-sky-400' : 'text-slate-600'}`} />
                </div>
              );
            })
          ) : (
            <div className="py-12 text-center text-slate-500 text-sm">
              {t.searchNoResults} "<span className="text-slate-300 font-semibold">{query}</span>"
            </div>
          )}
        </div>

        {/* Footer shortcuts helper */}
        <div className="flex items-center justify-between border-t border-slate-800 bg-slate-950/60 px-4 py-2 text-[11px] text-slate-500 font-mono">
          <div className="flex items-center gap-3">
            <span className="flex items-center gap-1">
              <kbd className="rounded bg-slate-800 px-1.5 py-0.5 text-[10px] text-slate-300">↑</kbd>
              <kbd className="rounded bg-slate-800 px-1.5 py-0.5 text-[10px] text-slate-300">↓</kbd>
              <span>Navigasi</span>
            </span>
            <span className="flex items-center gap-1">
              <kbd className="rounded bg-slate-800 px-1.5 py-0.5 text-[10px] text-slate-300">↵</kbd>
              <span>Pilih</span>
            </span>
          </div>
          <div className="text-sky-400 font-bold">Zen PHP Docs</div>
        </div>
      </div>
    </div>
  );
}
