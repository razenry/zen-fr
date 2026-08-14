import './globals.css';
import Navbar from '../components/Navbar';
import Sidebar from '../components/Sidebar';

export const metadata = {
  title: 'Zen PHP Framework — Portal Dokumentasi Resmi (v9.1.6)',
  description: 'Dokumentasi Resmi Zen PHP Framework dengan dukungan Inertia.js React 18, Zen Pulse, dan Dedicated REST API.',
};

export default function RootLayout({ children }) {
  return (
    <html lang="id">
      <body className="min-h-screen bg-slate-950 text-slate-100 antialiased font-sans">
        <Navbar />
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row gap-6">
            <Sidebar />
            <main className="min-w-0 flex-1 py-8">
              {children}
            </main>
          </div>
        </div>
      </body>
    </html>
  );
}
