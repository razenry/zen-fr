# Zen PHP Framework (v9.0.0) — Getting Started Guide

Welcome to **Zen PHP Framework v9.0.0**, an ultra-fast, modern, lightweight PHP MVC framework built with the Service-Repository pattern, native TailwindCSS v4 support, React 18 SPA Engine, Zen Pulse Live, and dedicated REST API mode with Swagger UI.

---

## 💻 System Requirements

- **PHP**: ^8.0 or higher
- **Composer**: ^2.0
- **Node.js**: ^18.0 (Optional, required for React 18 & Vite HMR)
- **Database**: MySQL, PostgreSQL, SQLite, or MariaDB

---

## 🚀 Quick Installation

### Option 1: Via Composer (Recommended)
```bash
composer create-project razenry/zen-php my-app
cd my-app
```

### Option 2: Via Git Clone (Version Switcher)
```bash
# Clone latest v9.0.0 release
git clone -b v9.0.0 https://github.com/razenry/zen-fr.git my-app
cd my-app

# Install PHP dependencies
composer install
```

---

## ⚡ Starting Development Server

Zen PHP Framework includes a **Built-in Concurrent Dev Server** (`php zen dev` / `composer run dev`) that launches both the PHP development server and Vite HMR server simultaneously:

```bash
# Concurrent PHP + Vite Dev Server (http://127.0.0.1:8000 & http://localhost:5173)
composer run dev

# Or launch PHP Dev Server only
php zen serve
```

---

## 📂 Framework Directory Structure

```text
my-app/
├── AGENTS.md                  # AI Agent Guidelines Handbook
├── README.md                  # Main Overview & Matrix
├── app/
│   ├── controllers/          # Web & API Controllers
│   ├── core/                 # Core Engine (App, Route, Auth, Gate, Config, Request, HttpResponse)
│   ├── helpers/              # Global Helper Functions (view(), react(), response(), gate(), authorize())
│   ├── middleware/           # HTTP Middleware (Auth, Cors, Security, RateLimit)
│   ├── models/               # Active Record / Eloquent Models
│   ├── repositories/         # Repository Pattern Implementation
│   ├── services/             # Business Logic Service Classes
│   └── views/                # Views, Layouts & Blade Components
├── docs/                     # Framework Documentation Suite
├── public/
│   └── index.php             # Primary Front Controller Entry Point
├── resources/
│   ├── css/app.css           # TailwindCSS v4 Theme File (@import "tailwindcss";)
│   └── js/app.jsx            # React 18 Mounting Entry Point
├── routes/
│   ├── web.php               # Web Routes
│   └── api.php               # REST API Routes
└── zen                       # Zen CLI Tool Executable
```
