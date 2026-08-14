<?php

/**
 * Zen PHP Framework — Global Helper Functions
 */

use App\Core\App;
use App\Core\HttpResponse;
use App\Core\Route;
use App\Core\Hash;
use App\Core\Crypt;
use App\Core\Benchmark;
use App\Core\Request;

if (!function_exists('baseUrl')) {
    function baseUrl($url = NULL)
    {
        $envBase = getenv('BASE_URL');
        if ($envBase && trim($envBase) !== '') {
            $base_url = rtrim($envBase, '/');
        } else {
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
            $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
            $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
            $dir = str_replace('\\', '/', dirname($scriptName));
            $dir = ($dir === '/' || $dir === '.') ? '' : $dir;
            $base_url = rtrim($protocol . $host . $dir, '/');
        }

        if ($url !== null && $url !== '') {
            return $base_url . '/' . ltrim($url, '/');
        } else {
            return $base_url;
        }
    }
}

if (!function_exists('adminUrl')) {
    function adminUrl($path = '')
    {
        return baseUrl('storage/images/' . ltrim($path, '/'));
    }
}

if (!function_exists('baseImageUrl')) {
    function baseImageUrl($path = '')
    {
        return baseUrl('storage/images/' . ltrim($path, '/'));
    }
}

if (!function_exists('imageUrl')) {
    function imageUrl($path = '')
    {
        return 'storage/images/' . ltrim($path, '/');
    }
}

if (!function_exists('route')) {
    function route(string $name, $params = [])
    {
        return Route::getUrl($name, $params);
    }
}

if (!function_exists('views')) {
    function views($url = NULL)
    {
        return baseUrl('app/views/' . ($url ? ltrim($url, '/') . '.php' : ''));
    }
}

if (!function_exists('view')) {
    /**
     * Render a Blade/PHP view template
     */
    function view(string $view, array $data = [], string $layout = 'main'): void
    {
        App::View($view, $data, $layout);
    }
}

// Register Inertia class aliases for Laravel compatibility
if (class_exists('App\Core\Inertia')) {
    if (!class_exists('Inertia\Inertia', false)) {
        class_alias(\App\Core\Inertia::class, 'Inertia\Inertia');
    }
    if (!class_exists('Inertia', false)) {
        class_alias(\App\Core\Inertia::class, 'Inertia');
    }
}

if (!function_exists('react')) {
    /**
     * Render a React 18 / Inertia SPA component
     */
    function react(string $component, array $props = [], string $layout = 'app'): void
    {
        \App\Core\Inertia::render($component, $props, $layout);
    }
}

if (!function_exists('inertia')) {
    /**
     * Render an Inertia.js React SPA component
     */
    function inertia(?string $component = null, array $props = [], string $layout = 'app')
    {
        if ($component === null) {
            return new \App\Core\Inertia();
        }
        return \App\Core\Inertia::render($component, $props, $layout);
    }
}

if (!function_exists('response')) {
    /**
     * Create an HTTP response instance
     */
    function response(): HttpResponse
    {
        return new HttpResponse();
    }
}

if (!function_exists('jsonResponse')) {
    /**
     * Return a JSON HTTP response
     */
    function jsonResponse(mixed $data = [], int $status = 200, array $headers = []): void
    {
        (new HttpResponse())->json($data, $status, $headers);
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['_csrf_token'])) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf_token'];
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    }
}

if (!function_exists('hash_make')) {
    function hash_make(string $value, array $options = []): string
    {
        return Hash::make($value, $options);
    }
}

if (!function_exists('hash_check')) {
    function hash_check(string $value, string $hashedValue): bool
    {
        return Hash::check($value, $hashedValue);
    }
}

if (!function_exists('crypt_encrypt')) {
    function crypt_encrypt(string $value): string
    {
        return Crypt::encrypt($value);
    }
}

if (!function_exists('crypt_decrypt')) {
    function crypt_decrypt(string $payload): string
    {
        return Crypt::decrypt($payload);
    }
}

if (!function_exists('execution_time')) {
    function execution_time(int $decimals = 4): float
    {
        return Benchmark::elapsed($decimals);
    }
}

if (!function_exists('memory_peak')) {
    function memory_peak(): string
    {
        return Benchmark::memory();
    }
}

if (!function_exists('request')) {
    function request($key = null, $default = null)
    {
        $req = Request::capture();
        if ($key === null) {
            return $req;
        }
        return $req->input($key, $default);
    }
}

if (!function_exists('gate')) {
    /**
     * Access Gate authorization instance
     */
    function gate(mixed $user = null): \App\Core\Gate
    {
        return \App\Core\Gate::forUser($user);
    }
}

if (!function_exists('authorize')) {
    /**
     * Authorize an ability or throw HTTP 403 Forbidden exception
     */
    function authorize(string $ability, mixed $params = null): bool
    {
        return \App\Core\Gate::authorize($ability, null, $params);
    }
}

if (!function_exists('auth')) {
    /**
     * Access Auth manager instance
     */
    function auth(string $guard = 'web')
    {
        return \App\Core\Auth::guard($guard);
    }
}
