# Installation & Setup

Zen PHP Framework is a modern, ultra-lightweight, fast, and enterprise-ready PHP framework with built-in Service-Repository patterns, Zen Pulse reactive engine, and Pest PHP testing.

---

## System Requirements

- **PHP**: 8.0 or higher (PHP 8.3 / 8.4 fully supported)
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **Extensions**: `pdo`, `pdo_mysql`, `mbstring`, `json`
- **Composer**: 2.0+

---

## 1. Installation via Composer

The recommended way to install Zen PHP Framework is using Composer:

```bash
composer create-project razenry/zen-php my-app
cd my-app
```

---

## 2. Environment Setup (`zen setup`)

Run the automated setup command via Zen CLI to prepare your workspace:

```bash
php zen setup
```

This command will:
- Generate a new `.env` environment file from `.env.example`.
- Ensure directory permissions and paths (`app/repositories`, `app/services`, `app/pulse`, `tests/Unit`, `tests/Feature`).
- Initialize your clean workspace ready for production.

---

## 3. Database Configuration

Open your `.env` file and configure your MySQL database credentials:

```ini
DB_HOST=localhost
DB_USER=root
DB_PASS=secret
DB_NAME=my_app_db
```

---

## 4. Run Migrations & Start Development Server

Run database migrations:

```bash
php zen migrate
```

Start PHP built-in local development server:

```bash
php -S localhost:8000
```

Open `http://localhost:8000` in your web browser!
