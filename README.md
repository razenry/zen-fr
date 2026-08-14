# Zen PHP Framework (v9.0.0 Major Release)

Zen PHP Framework adalah framework PHP modern, ultra-ringan, dan cepat yang mengombinasikan arsitektur MVC enterprise, Service & Repository Pattern, 3 Starter Presets (REST API Dedicated + Swagger UI, React 18 + Vite SPA, & Zen Pulse Live) dengan pembersihan *footprint* otomatis, Built-in Concurrent Dev Server (`composer run dev` / `php zen dev`), TailwindCSS v4 Native Engine, Multi-Guard Auth & Gate System, serta Pengujian Otomatis Pest PHP.

---

## 📦 Version Switcher Matrix

| Versi | Status | Git Branch / Tag | Perintah Install / Checkout |
| :--- | :--- | :--- | :--- |
| **v9.0.0** | **Latest Major (Recommended)** | `v9.0.0` | `git clone -b v9.0.0 https://github.com/razenry/zen-fr.git` |
| **v8.3.1** | Minor Release | `v8.3.1` | `git clone -b v8.3.1 https://github.com/razenry/zen-fr.git` |
| **v8.0.0** | Major Release | `v8.0.0` | `git clone -b v8.0.0 https://github.com/razenry/zen-fr.git` |
| **v7.1.0** | Minor Release | `v7.1.0` | `git clone -b v7.1.0 https://github.com/razenry/zen-fr.git` |

```bash
# Download via Composer
composer create-project razenry/zen-php my-app
```

---

## ⚡ 3 Starter Presets (`php zen preset:<mode>`)

### 1. Fullstack React 18 + Vite (`php zen preset:react`)
Aktifkan React 18 SPA Engine + Vite HMR + TailwindCSS v4:
```bash
php zen preset:react
npm install
composer run dev
```

#### ⚛️ Tutorial React 18 Routing & Simple CRUD
**Step 1: Route Definition (`routes/web.php`)**
```php
use App\Core\Route;
use App\Controllers\ProductController;

Route::get('/', function () {
    react('Pages/Dashboard', [
        'title' => 'Zen PHP React CRUD',
        'user' => ['name' => 'Developer']
    ]);
});
```

**Step 2: React Component (`resources/js/Pages/Dashboard.jsx`)**
```jsx
import React, { useState } from 'react';

export default function Dashboard({ title, user }) {
  const [items, setItems] = useState([
    { id: 1, name: 'Produk A', price: 50000 },
  ]);
  const [name, setName] = useState('');
  const [price, setPrice] = useState('');

  const handleAdd = (e) => {
    e.preventDefault();
    if (!name || !price) return;
    setItems([...items, { id: Date.now(), name, price: Number(price) }]);
    setName('');
    setPrice('');
  };

  const handleDelete = (id) => {
    setItems(items.filter(item => item.id !== id));
  };

  return (
    <div className="p-8 max-w-xl mx-auto bg-slate-900 text-white rounded-2xl shadow-2xl">
      <h1 className="text-2xl font-bold mb-4">{title}</h1>
      <form onSubmit={handleAdd} className="flex gap-2 mb-4">
        <input 
          value={name} 
          onChange={(e) => setName(e.target.value)} 
          placeholder="Nama Barang" 
          className="px-3 py-2 bg-slate-800 rounded border border-slate-700 text-sm flex-1"
        />
        <input 
          value={price} 
          onChange={(e) => setPrice(e.target.value)} 
          placeholder="Harga" 
          type="number"
          className="px-3 py-2 bg-slate-800 rounded border border-slate-700 text-sm w-32"
        />
        <button type="submit" className="px-4 py-2 bg-sky-500 text-slate-950 font-bold rounded text-sm">
          Tambah
        </button>
      </form>
      <ul className="space-y-2">
        {items.map(item => (
          <li key={item.id} className="flex justify-between items-center bg-slate-800 p-3 rounded">
            <span>{item.name} — Rp {item.price.toLocaleString()}</span>
            <button onClick={() => handleDelete(item.id)} className="text-rose-400 text-xs">Hapus</button>
          </li>
        ))}
      </ul>
    </div>
  );
}
```

---

### 2. Fullstack Zen Pulse Live (`php zen preset:pulse`)
Server-driven reactive Blade components tanpa perlu bundler JS eksternal:
```bash
php zen preset:pulse
composer run dev
```

#### 🔥 Tutorial Zen Pulse Routing & Simple CRUD
**Step 1: Route Definition (`routes/web.php`)**
```php
use App\Core\Route;
use App\Controllers\HomeController;
use App\Controllers\PulseController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/_zen/pulse', [PulseController::class, 'handle'])->name('zen.pulse');
```

**Step 2: Pulse View Component (`app/views/pulse/counter.php`)**
```html
<div class="p-6 bg-slate-800 text-white rounded-2xl text-center">
    <h2 class="text-3xl font-bold mb-2">Counter: <?= $count ?? 0 ?></h2>
    <div class="flex justify-center gap-3">
        <button zen-click="increment" class="px-4 py-2 bg-sky-500 text-slate-950 font-bold rounded">+ Increment</button>
        <button zen-click="reset" class="px-4 py-2 bg-slate-700 rounded">Reset</button>
    </div>
</div>
```

---

### 3. REST API Dedicated & Enterprise Standard (`php zen preset:api`)
Back-end dedicated untuk mobile app & frontend modern dengan integrasi **Swagger UI** di `/docs`:

```bash
php zen preset:api
```

#### 🌐 Standar Response Enterprise API
Seluruh response REST API Zen Framework menggunakan format standar berikut:

```json
{
  "status": true,
  "success": true,
  "message": "Data berhasil diambil",
  "data": [
    {
      "id": 1,
      "name": "Zen Enterprise API",
      "price": 100000
    }
  ],
  "meta": {
    "page": 1,
    "total": 50
  }
}
```

---

## 🔐 Authorization & Gate Security Engine

Zen Framework v9.0.0 dilengkapi sistem otorisasi tingkat enterprise:

```php
use App\Core\Gate;

// Define Gate ability
Gate::define('edit-product', function ($user, $product) {
    return $user['id'] === $product['user_id'];
});

// Authorize inside controller
authorize('edit-product', $product); // Throws 403 Forbidden Exception if unauthorized
```

---

## 🧪 Testing Engine (Pest PHP)

Jalankan test suite Pest PHP:
```bash
php zen test
# atau
vendor/bin/pest
```
