# Zen CLI (Command Line Interface)

Zen PHP includes an interactive, dynamic, and colorful command-line interface tool named **Zen CLI** to accelerate developer productivity.

---

## Available Commands

Run `php zen` in your project terminal to view all available commands:

```bash
php zen
```

---

## Project Setup & Workspace Initialization

```bash
php zen setup
```

---

## Scaffolding Generators

### Create Repository
```bash
php zen make:repository UserRepository
```

### Create Service
```bash
php zen make:service UserService
```

### Create Zen Pulse Reactive Component
```bash
php zen make:pulse Counter
```

### Create RESTful API Controller
```bash
php zen make:api-controller Api/v1/ProductController
```

### Create API Resource DTO Transformer
```bash
php zen make:resource ProductResource
```

### Create HTTP Middleware
```bash
php zen make:middleware AuthMiddleware
```

### Create Pest Test File
```bash
php zen make:test UserServiceTest
```

---

## Testing & Optimization Commands

```bash
# Run Pest PHP test suite (0.21s execution)
php zen test

# Clear temporary files and session buffers
php zen clear

# Optimize framework performance
php zen optimize

# Database Migrations
php zen migrate
php zen migrate:refresh
```
