'use client';

import React, { createContext, useContext, useState, useEffect } from 'react';

const LanguageContext = createContext();

export const LANGUAGES = [
  { code: 'id', label: 'Bahasa Indonesia', flag: '🇮🇩' },
  { code: 'en', label: 'English', flag: '🇺🇸' },
  { code: 'ja', label: '日本語', flag: '🇯🇵' },
  { code: 'zh', label: '中文', flag: '🇨🇳' },
];

export function LanguageProvider({ children }) {
  const [language, setLanguageState] = useState('id');
  const [mounted, setMounted] = useState(false);

  useEffect(() => {
    setMounted(true);
    const saved = localStorage.getItem('zen_docs_lang');
    if (saved && ['id', 'en', 'ja', 'zh'].includes(saved)) {
      setLanguageState(saved);
    }
  }, []);

  const setLanguage = (lang) => {
    if (['id', 'en', 'ja', 'zh'].includes(lang)) {
      setLanguageState(lang);
      if (typeof window !== 'undefined') {
        localStorage.setItem('zen_docs_lang', lang);
      }
    }
  };

  return (
    <LanguageContext.Provider value={{ language, setLanguage, mounted }}>
      {children}
    </LanguageContext.Provider>
  );
}

export function useLanguage() {
  const context = useContext(LanguageContext);
  if (!context) {
    throw new Error('useLanguage must be used within a LanguageProvider');
  }
  return context;
}
