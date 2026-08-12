<?php

/**
 * Database constants from environment
 */
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: '');

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

function adminUrl($path = '')
{
    return baseUrl('storage/images/' . ltrim($path, '/'));
}

function baseImageUrl($path = '')
{
    return baseUrl('storage/images/' . ltrim($path, '/'));
}

function imageUrl($path = '')
{
    return 'storage/images/' . ltrim($path, '/');
}

function route(string $name, $params = [])
{
    return \App\Core\Route::getUrl($name, $params);
}

function views($url = NULL)
{
    return baseUrl('app/views/' . ($url ? ltrim($url, '/') . '.php' : ''));
}

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

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
}

function hash_make(string $value, array $options = []): string
{
    return \App\Core\Hash::make($value, $options);
}

function hash_check(string $value, string $hashedValue): bool
{
    return \App\Core\Hash::check($value, $hashedValue);
}

function crypt_encrypt(string $value): string
{
    return \App\Core\Crypt::encrypt($value);
}

function crypt_decrypt(string $payload): string
{
    return \App\Core\Crypt::decrypt($payload);
}

function execution_time(int $decimals = 4): float
{
    return \App\Core\Benchmark::elapsed($decimals);
}

function memory_peak(): string
{
    return \App\Core\Benchmark::memory();
}


