# AI Agent Guidelines — Zen PHP Framework (v9.0.0)

Welcome AI Coding Assistant! This document outlines the core conventions, architecture, and code generation guidelines for **Zen PHP Framework v9.0.0**.

---

## 🚀 Key Framework Concepts & Conventions

### 1. Project Structure
- `app/controllers/` — Web & API Controllers (`Controller`, `BaseController`).
- `app/core/` — Framework core classes (`App`, `Route`, `Auth`, `Gate`, `Config`, `HttpResponse`, `Request`).
- `app/helpers/helpers.php` — Global helper functions (`view()`, `react()`, `response()`, `jsonResponse()`, `baseUrl()`, `route()`, `gate()`, `authorize()`, `auth()`).
- `app/models/` — Active Record / Eloquent models.
- `app/repositories/` — Repository classes implementing `RepositoryInterface`.
- `app/services/` — Business logic service classes extending `BaseService`.
- `app/views/` — View templates (`layouts/main.php`, `components/`, `home/index.php`).
- `public/index.php` — Primary Front Controller entry point for web servers and `php zen serve`.
- `routes/web.php` & `routes/api.php` — Web and REST API route definitions.
- `resources/js/` — React 18 SPA components (`app.jsx`, `Pages/Dashboard.jsx`).

---

## ⚡ Core Rules for Code Generation

### A. Routing
Always use the `App\Core\Route` class in `routes/web.php` or `routes/api.php`:
```php
use App\Core\Route;
use App\Controllers\ProductController;

// Web Route
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// REST API Route
Route::post('/api/v1/products', [ProductController::class, 'store'])->name('api.products.store');
```

### B. Rendering Views & React SPA
- **Blade / PHP View**:
  ```php
  view('home.index', ['title' => 'Welcome']);
  ```
- **React 18 Component**:
  ```php
  react('Pages/Dashboard', ['title' => 'Dashboard', 'user' => $user]);
  ```

### C. Authorization & Gate Checks
Use `gate()` or `authorize()` helpers inside controllers or policies:
```php
// Inline authorization check
if (gate()->denies('edit-product', $product)) {
    authorize('edit-product', $product); // Throws HTTP 403 Forbidden Exception
}
```

### D. Service-Repository Pattern
Maintain clear separation of concerns:
1. **Controller**: Handles HTTP request & calls Service.
2. **Service**: Contains business logic, validation, and calls Repository.
3. **Repository**: Handles database queries via Models.

---

## 🛠️ CLI Presets & Execution Commands

- `php zen serve` or `composer run dev` — Launches concurrent PHP web server (`http://127.0.0.1:8000`) and Vite HMR server (`http://localhost:5173`).
- `php zen preset:react` — Configures React 18 + Vite + TailwindCSS v4 mode.
- `php zen preset:pulse` — Configures Zen Pulse Live reactive mode.
- `php zen preset:api` — Configures REST API Only mode (+ Swagger UI at `/docs`).
