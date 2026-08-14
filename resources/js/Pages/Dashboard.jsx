import React, { useState } from 'react';

export default function Dashboard({ title = 'Zen PHP React Dashboard', user = { name: 'Developer' } }) {
  const [count, setCount] = useState(0);

  return (
    <div className="min-h-screen bg-slate-900 text-slate-100 flex flex-col items-center justify-center p-6">
      <div className="max-w-xl w-full bg-slate-800 border border-slate-700 rounded-2xl p-8 shadow-2xl text-center space-y-6">
        <div className="inline-flex items-center justify-center w-16 h-16 bg-sky-500/10 text-sky-400 rounded-full text-3xl font-bold">
          ⚡
        </div>
        <h1 className="text-3xl font-extrabold tracking-tight text-white">{title}</h1>
        <p className="text-slate-400">
          Selamat datang, <span className="text-sky-400 font-semibold">{user.name}</span>! Komponen React ini dirender secara seamless oleh <strong className="text-white">Zen PHP v8.0.0</strong> via Vite + TailwindCSS.
        </p>

        <div className="bg-slate-900/60 p-6 rounded-xl border border-slate-700/50 flex flex-col items-center gap-4">
          <p className="text-sm text-slate-400 font-mono">React Reactive State Counter</p>
          <div className="text-5xl font-black text-sky-400 font-mono">{count}</div>
          <div className="flex gap-3">
            <button
              onClick={() => setCount(count + 1)}
              className="px-5 py-2.5 bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold rounded-xl shadow-lg transition active:scale-95"
            >
              + Increment
            </button>
            <button
              onClick={() => setCount(0)}
              className="px-4 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 font-semibold rounded-xl transition active:scale-95"
            >
              Reset
            </button>
          </div>
        </div>

        <div className="pt-4 border-t border-slate-700/50 text-xs text-slate-500">
          Powered by Zen PHP Framework v8.0.0 • Vite HMR Enabled
        </div>
      </div>
    </div>
  );
}
