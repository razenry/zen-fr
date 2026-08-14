'use client';

import React, { useState } from 'react';
import { Check, Copy } from 'lucide-react';
import { useLanguage } from '../context/LanguageContext';
import { uiTranslations } from '../data/documentationData';

export default function CodeBlock({ code, language = 'bash' }) {
  const { language: lang } = useLanguage();
  const t = uiTranslations[lang] || uiTranslations.id;
  const [copied, setCopied] = useState(false);

  const handleCopy = () => {
    if (typeof window !== 'undefined' && navigator.clipboard) {
      navigator.clipboard.writeText(code);
      setCopied(true);
      setTimeout(() => setCopied(false), 2000);
    }
  };

  return (
    <div className="relative my-4 overflow-hidden rounded-2xl border border-slate-800 bg-slate-950 font-mono text-xs shadow-2xl">
      <div className="flex items-center justify-between border-b border-slate-800/80 bg-slate-900/80 px-4 py-2.5 text-[11px] text-slate-400">
        <div className="flex items-center gap-2">
          <div className="flex gap-1.5 mr-2">
            <span className="h-2.5 w-2.5 rounded-full bg-rose-500/80"></span>
            <span className="h-2.5 w-2.5 rounded-full bg-amber-500/80"></span>
            <span className="h-2.5 w-2.5 rounded-full bg-emerald-500/80"></span>
          </div>
          <span className="font-semibold uppercase tracking-wider text-sky-400 font-mono">{language}</span>
        </div>
        <button
          onClick={handleCopy}
          className="flex items-center gap-1.5 rounded-lg border border-slate-700/60 bg-slate-800/80 px-2.5 py-1 text-[11px] font-semibold text-slate-300 transition hover:bg-slate-700 hover:text-white"
        >
          {copied ? (
            <>
              <Check className="h-3.5 w-3.5 text-emerald-400" />
              <span className="text-emerald-400">{t.copied}</span>
            </>
          ) : (
            <>
              <Copy className="h-3.5 w-3.5 text-slate-400" />
              <span>{t.copyCode}</span>
            </>
          )}
        </button>
      </div>

      <pre className="overflow-x-auto p-4 leading-relaxed text-slate-200 selection:bg-sky-500/30">
        <code>{code}</code>
      </pre>
    </div>
  );
}
