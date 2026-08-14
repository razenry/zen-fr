'use client';

import React, { useState } from 'react';
import { Check, Copy, Code2 } from 'lucide-react';
import { useLanguage } from '../context/LanguageContext';
import { uiTranslations } from '../data/documentationData';

// Simple lightweight syntax tokenizer for PHP, JSX, HTML, Bash, and JSON
function highlightCode(code, lang) {
  if (!code) return '';

  const esc = (str) =>
    str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

  let html = esc(code);

  // 1. Comments
  html = html.replace(/(\/\/[^\n]*|\/\*[\s\S]*?\*\/|#[^\n]*)/g, '<span class="text-slate-500 italic">$1</span>');

  // 2. Strings (double quotes and single quotes)
  html = html.replace(/("(?:[^"\\]|\\.)*"|'(?:[^'\\]|\\.)*')/g, '<span class="text-emerald-400">$1</span>');

  // 3. Keywords
  if (['php', 'jsx', 'js', 'javascript'].includes(lang)) {
    const keywords = [
      'namespace', 'use', 'class', 'extends', 'implements', 'function', 'public', 'private', 'protected',
      'static', 'return', 'if', 'else', 'foreach', 'for', 'while', 'as', 'new', 'try', 'catch',
      'import', 'export', 'default', 'const', 'let', 'var', 'await', 'async', 'from', 'true', 'false', 'null'
    ];
    const kwRegex = new RegExp(`\\b(${keywords.join('|')})\\b`, 'g');
    html = html.replace(kwRegex, '<span class="text-sky-400 font-bold">$1</span>');

    // PHP Variables ($variable)
    html = html.replace(/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/g, '<span class="text-amber-300">$1</span>');
  }

  if (['bash', 'sh'].includes(lang)) {
    const bashKw = ['composer', 'php', 'zen', 'npm', 'run', 'dev', 'install', 'create-project', 'git', 'clone', 'cd', 'make'];
    const bashRegex = new RegExp(`\\b(${bashKw.join('|')})\\b`, 'g');
    html = html.replace(bashRegex, '<span class="text-sky-400 font-bold">$1</span>');
  }

  // 4. Numbers
  html = html.replace(/\b(\d+)\b/g, '<span class="text-purple-400 font-bold">$1</span>');

  // 5. JSX / HTML Tags
  if (['jsx', 'html'].includes(lang)) {
    html = html.replace(/(&lt;\/?[a-zA-Z0-9]+(?:\s+[^&]*)?\/?&gt;)/g, '<span class="text-rose-400">$1</span>');
  }

  return html;
}

export default function CodeBlock({ code, language = 'bash', showLineNumbers = true }) {
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

  const lines = code.trim().split('\n');
  const highlighted = highlightCode(code, language.toLowerCase());

  return (
    <div className="relative my-6 overflow-hidden rounded-2xl border border-slate-800 bg-slate-950 font-mono text-xs shadow-2xl transition hover:border-slate-700">
      {/* Code Header Bar (macOS Window Control Style) */}
      <div className="flex items-center justify-between border-b border-slate-800/80 bg-slate-900/90 px-4 py-2.5 text-[11px] text-slate-400 select-none">
        <div className="flex items-center gap-3">
          <div className="flex gap-1.5">
            <span className="h-3 w-3 rounded-full bg-rose-500/80 inline-block"></span>
            <span className="h-3 w-3 rounded-full bg-amber-500/80 inline-block"></span>
            <span className="h-3 w-3 rounded-full bg-emerald-500/80 inline-block"></span>
          </div>
          <div className="flex items-center gap-1.5 font-bold uppercase tracking-wider text-sky-400 font-mono text-[10px]">
            <Code2 className="h-3.5 w-3.5 text-sky-400" />
            <span>{language}</span>
          </div>
        </div>

        <button
          onClick={handleCopy}
          className="flex items-center gap-1.5 rounded-lg border border-slate-700/60 bg-slate-800/80 px-2.5 py-1 text-[11px] font-semibold text-slate-300 transition hover:bg-slate-700 hover:text-white active:scale-95"
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

      {/* Code Area with optional Line Numbers */}
      <div className="flex overflow-x-auto p-4 leading-relaxed text-slate-200 selection:bg-sky-500/30 selection:text-sky-200">
        {showLineNumbers && (
          <div className="select-none pr-4 text-right text-slate-600 font-mono text-[11px] border-r border-slate-800/60 mr-4 shrink-0">
            {lines.map((_, i) => (
              <div key={i}>{i + 1}</div>
            ))}
          </div>
        )}
        <pre className="flex-1 overflow-x-auto font-mono text-xs">
          <code dangerouslySetInnerHTML={{ __html: highlighted }} />
        </pre>
      </div>
    </div>
  );
}
