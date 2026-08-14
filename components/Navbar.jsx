'use client';

import React, { useState, useEffect, useRef } from 'react';
import Link from 'next/link';
import { ExternalLink, Github, Zap, Search, Globe, ChevronDown, Menu, X } from 'lucide-react';
import { useLanguage, LANGUAGES } from '../context/LanguageContext';
import { uiTranslations } from '../data/documentationData';

export default function Navbar({ onOpenSearch, onToggleMobileMenu, isMobileMenuOpen }) {
  const { language, setLanguage } = useLanguage();
  const t = uiTranslations[language] || uiTranslations.id;
  const [langDropdownOpen, setLangDropdownOpen] = useState(false);
  const dropdownRef = useRef(null);

  const currentLang = LANGUAGES.find((l) => l.code === language) || LANGUAGES[0];

  useEffect(() => {
    const handleClickOutside = (e) => {
      if (dropdownRef.current && !dropdownRef.current.contains(e.target)) {
        setLangDropdownOpen(false);
      }
    };
    document.addEventListener('mousedown', handleClickOutside);
    return () => document.removeEventListener('mousedown', handleClickOutside);
  }, []);

  return (
    <header className="sticky top-0 z-40 w-full border-b border-slate-800/80 bg-slate-950/80 backdrop-blur-xl">
      <div className="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        
        {/* Left: Mobile Menu Toggle + Brand Logo */}
        <div className="flex items-center gap-3">
          <button
            onClick={onToggleMobileMenu}
            className="md:hidden p-2 rounded-xl text-slate-400 hover:bg-slate-900 hover:text-white transition"
            aria-label="Toggle menu"
          >
            {isMobileMenuOpen ? <X className="h-5 w-5" /> : <Menu className="h-5 w-5" />}
          </button>

          <Link href="/" className="flex items-center gap-3 transition hover:opacity-90">
            <div className="flex h-10 w-10 items-center justify-center rounded-xl border border-sky-500/20 bg-sky-500/10 text-sky-400 shadow-inner">
              <Zap className="h-5 w-5 fill-sky-400/20" />
            </div>
            <div>
              <span className="text-lg font-black tracking-tight text-white font-sans">
                Zen <span className="text-sky-400">PHP</span>
              </span>
              <span className="ml-2.5 rounded-full border border-sky-500/30 bg-sky-500/10 px-2 py-0.5 text-[10px] font-bold font-mono text-sky-400">
                v9.1.6
              </span>
            </div>
          </Link>
        </div>

        {/* Middle: Interactive Search Bar Trigger */}
        <div className="flex-1 max-w-md mx-4 hidden sm:block">
          <button
            onClick={onOpenSearch}
            className="w-full flex items-center justify-between rounded-xl border border-slate-800 bg-slate-900/60 px-3.5 py-1.5 text-xs text-slate-400 hover:border-slate-700 hover:text-slate-200 transition shadow-inner"
          >
            <div className="flex items-center gap-2.5">
              <Search className="h-4 w-4 text-sky-400" />
              <span>{t.searchPlaceholder}</span>
            </div>
            <kbd className="rounded border border-slate-700 bg-slate-800 px-1.5 py-0.5 text-[10px] font-mono font-semibold text-slate-400">
              Ctrl K
            </kbd>
          </button>
        </div>

        {/* Right: Search Mobile + Language Switcher + GitHub Link */}
        <div className="flex items-center gap-2 sm:gap-3">
          {/* Mobile Search Button */}
          <button
            onClick={onOpenSearch}
            className="sm:hidden p-2 rounded-xl border border-slate-800 bg-slate-900 text-sky-400 hover:bg-slate-800 transition"
          >
            <Search className="h-4 w-4" />
          </button>

          {/* Multi-Language Dropdown */}
          <div className="relative" ref={dropdownRef}>
            <button
              onClick={() => setLangDropdownOpen(!langDropdownOpen)}
              className="flex items-center gap-2 rounded-xl bg-slate-900 border border-slate-800 px-3 py-1.5 text-xs font-semibold text-slate-200 hover:border-slate-700 transition"
            >
              <Globe className="h-3.5 w-3.5 text-sky-400" />
              <span>{currentLang.flag} {currentLang.code.toUpperCase()}</span>
              <ChevronDown className="h-3 w-3 text-slate-500" />
            </button>

            {langDropdownOpen && (
              <div className="absolute right-0 mt-2 w-48 rounded-xl border border-slate-800 bg-slate-900 p-1.5 shadow-2xl z-50 animate-fadeIn">
                <div className="px-2 py-1 text-[10px] font-bold text-slate-500 uppercase tracking-wider font-mono">
                  {t.selectLanguage}
                </div>
                {LANGUAGES.map((item) => (
                  <button
                    key={item.code}
                    onClick={() => {
                      setLanguage(item.code);
                      setLangDropdownOpen(false);
                    }}
                    className={`flex items-center justify-between w-full px-2.5 py-2 text-xs rounded-lg transition ${
                      language === item.code
                        ? 'bg-sky-500/10 text-sky-400 font-bold border border-sky-500/20'
                        : 'text-slate-300 hover:bg-slate-800 hover:text-white'
                    }`}
                  >
                    <span className="flex items-center gap-2">
                      <span>{item.flag}</span>
                      <span>{item.label}</span>
                    </span>
                    {language === item.code && <span className="h-1.5 w-1.5 rounded-full bg-sky-400"></span>}
                  </button>
                ))}
              </div>
            )}
          </div>

          {/* GitHub Repo Link */}
          <a
            href="https://github.com/razenry/zen-fr"
            target="_blank"
            rel="noopener noreferrer"
            className="flex items-center gap-2 rounded-xl bg-slate-900 border border-slate-800 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:border-slate-700 hover:text-white transition"
          >
            <Github className="h-4 w-4" />
            <span className="hidden lg:inline">GitHub</span>
            <ExternalLink className="h-3 w-3 opacity-60" />
          </a>
        </div>

      </div>
    </header>
  );
}
