'use client';

import React, { useState, useEffect } from 'react';
import './globals.css';
import { LanguageProvider } from '../context/LanguageContext';
import Navbar from '../components/Navbar';
import Sidebar from '../components/Sidebar';
import SearchModal from '../components/SearchModal';

export default function RootLayout({ children }) {
  const [isSearchOpen, setIsSearchOpen] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleOpenSearch = () => setIsSearchOpen(true);
    window.addEventListener('open-zen-search', handleOpenSearch);
    return () => window.removeEventListener('open-zen-search', handleOpenSearch);
  }, []);

  return (
    <html lang="id" className="dark">
      <head>
        <title>Zen PHP Framework — Portal Dokumentasi Resmi (v9.1.6)</title>
        <meta name="description" content="Dokumentasi Resmi Zen PHP Framework dengan dukungan Inertia.js React 18, Zen Pulse, dan Dedicated REST API." />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
      </head>
      <body className="min-h-screen bg-slate-950 text-slate-100 antialiased font-sans selection:bg-sky-500/30 selection:text-sky-200">
        <LanguageProvider>
          <div className="relative min-h-screen flex flex-col">
            <Navbar 
              onOpenSearch={() => setIsSearchOpen(true)}
              onToggleMobileMenu={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              isMobileMenuOpen={isMobileMenuOpen}
            />

            <div className="mx-auto max-w-7xl w-full px-4 sm:px-6 lg:px-8 flex-1">
              <div className="flex flex-col md:flex-row min-h-[calc(100vh-4rem)]">
                <Sidebar 
                  isMobileOpen={isMobileMenuOpen}
                  onCloseMobile={() => setIsMobileMenuOpen(false)}
                />
                
                <main className="min-w-0 flex-1 py-8 md:px-8">
                  {children}
                </main>
              </div>
            </div>

            <SearchModal 
              isOpen={isSearchOpen}
              onClose={() => setIsSearchOpen(false)}
            />
          </div>
        </LanguageProvider>
      </body>
    </html>
  );
}
