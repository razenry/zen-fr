# Zen PHP Framework — React 18 & Vite SPA Guide

Zen PHP Framework v9.0.0 provides seamless integration with **React 18**, **Vite HMR**, and **TailwindCSS v4 Native Engine**.

---

## ⚡ Activation & Setup

Run the CLI preset command in your project directory:

```bash
# 1. Activate React 18 Preset
php zen preset:react

# 2. Install Node dependencies
npm install

# 3. Start Dev Server (PHP + Vite HMR)
composer run dev
```

---

## ⚛️ Controller to React Component Hydration

In your controller (`app/controllers/HomeController.php`), use the `react()` helper or `App::React()`:

```php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\App;

class HomeController extends Controller
{
    public function index()
    {
        return App::React('Pages/Dashboard', [
            'title' => 'Zen React 18 Dashboard',
            'user'  => ['name' => 'Alice', 'role' => 'Administrator'],
            'stats' => ['users' => 1250, 'revenue' => 45000000]
        ]);
    }
}
```

---

## 💻 React Component Definition (`resources/js/Pages/Dashboard.jsx`)

```jsx
import React, { useState } from 'react';

export default function Dashboard({ title, user, stats }) {
  const [count, setCount] = useState(0);

  return (
    <div className="min-h-screen bg-slate-950 text-white p-8 font-sans">
      <div className="max-w-4xl mx-auto bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl">
        <h1 className="text-3xl font-black text-sky-400 mb-2">{title}</h1>
        <p className="text-slate-400 mb-6">Welcome, {user.name} ({user.role})</p>

        <div className="grid grid-cols-2 gap-4 mb-6">
          <div className="bg-slate-800 p-4 rounded-xl text-center">
            <div className="text-2xl font-bold font-mono">{stats.users}</div>
            <div className="text-xs text-slate-400">Total Users</div>
          </div>
          <div className="bg-slate-800 p-4 rounded-xl text-center">
            <div className="text-2xl font-bold font-mono">Rp {stats.revenue.toLocaleString()}</div>
            <div className="text-xs text-slate-400">Total Revenue</div>
          </div>
        </div>

        <div className="bg-slate-950 p-6 rounded-2xl border border-slate-800 text-center">
          <div className="text-4xl font-mono font-bold text-sky-400 mb-4">{count}</div>
          <button 
            onClick={() => setCount(count + 1)}
            className="px-6 py-2.5 bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold rounded-xl shadow-lg transition"
          >
            Increment Counter
          </button>
        </div>
      </div>
    </div>
  );
}
```
