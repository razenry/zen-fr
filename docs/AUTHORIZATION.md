# Zen PHP Framework — Authorization & Security Engine

Zen PHP Framework v9.0.0 features a fine-grained **Gate & Policy Authorization Engine** with multi-guard authentication support.

---

## 🔐 Defining Abilities (`App\Core\Gate`)

Define abilities in your service providers or bootstrap logic:

```php
use App\Core\Gate;

// Define an ability callback
Gate::define('edit-product', function ($user, $product) {
    return $user['id'] === $product['user_id'] || ($user['role'] ?? '') === 'admin';
});

// Map a Model to a Policy Class
Gate::policy(\App\Models\Product::class, \App\Policies\ProductPolicy::class);
```

---

## ⚡ Authorization Helper Functions

Use the `gate()` or `authorize()` global helpers anywhere in your controllers or services:

```php
// Check if user has permission
if (gate()->allows('edit-product', $product)) {
    // Proceed with edit
}

// Check if user is denied
if (gate()->denies('edit-product', $product)) {
    // Access denied
}

// Authorize action or throw HTTP 403 Forbidden Exception
authorize('edit-product', $product);
```

---

## 🛡️ Blade Component Directives (`@can` & `@auth`)

In your Blade view templates:

```html
@can('edit-product', $product)
    <a href="/products/1/edit" class="btn btn-sm">Edit Product</a>
@endcan

@auth
    <p>Welcome back, <?= auth()->user()['name'] ?></p>
@endauth
```
