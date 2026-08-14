'use client';

import React, { useState } from 'react';
import { Check, Copy } from 'lucide-react';

export default function CodeBlock({ code, language = 'bash' }) {
  const [copied, setCopied] = useState(false);

  const handleCopy = () => {
    navigator.clipboard.writeText(code);
    setCopied(true);
    setTimeout(() => setCopied(false), 2000);
  };

  return (
    <div className="relative my-4 overflow-hidden rounded-2xl border border-slate-800 bg-slate-950 font-mono text-xs shadow-2xl">
      <div className="flex items-center justify-between border-b border-slate-800/80 bg-slate-900/60 px-4 py-2 text-[11px] text-slate-400">
        <span className="font-semibold uppercase tracking-wider text-slate-500">{language}</span>
        <button
          onClick={handleCopy}
          className="flex items-center gap-1.5 rounded-lg border border-slate-700/60 bg-slate-800/80 px-2.5 py-1 text-[11px] font-semibold text-slate-300 transition hover:bg-slate-700 hover:text-white"
        >
          {copied ? (
            <>
              <Check className="h-3.5 w-3.5 text-emerald-400" />
              <span className="text-emerald-400">Tersalin!</span>
            </>
          ) : (
            <>
              <Copy className="h-3.5 w-3.5 text-slate-400" />
              <span>Salin Kode</span>
            </>
          )}
        </button>
      </div>

      <pre className="overflow-x-auto p-4 leading-relaxed text-slate-200">
        <code>{code}</code>
      </pre>
    </div>
  );
}
