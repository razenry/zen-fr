<?php

namespace App\Core;

class Config
{
    protected static array $items = [];

    public static function get(string $key, mixed $default = null): mixed
    {
        if (empty(static::$items)) {
            static::load();
        }

        return static::$items[$key] ?? getenv($key) ?: $default;
    }

    public static function set(string $key, mixed $value): void
    {
        static::$items[$key] = $value;
    }

    public static function load(): void
    {
        $cacheFile = dirname(__DIR__, 2) . '/storage/framework/config.php';
        if (file_exists($cacheFile)) {
            static::$items = (array) require $cacheFile;
            return;
        }

        static::$items = [
            'app_name' => getenv('APP_NAME') ?: 'Zen PHP Framework',
            'env' => getenv('APP_ENV') ?: 'local',
            'debug' => getenv('APP_DEBUG') ?: true,
            'url' => getenv('BASE_URL') ?: 'http://localhost',
            'db_host' => getenv('DB_HOST') ?: 'localhost',
            'db_name' => getenv('DB_NAME') ?: '',
            'db_user' => getenv('DB_USER') ?: 'root',
        ];
    }

    public static function cache(): bool
    {
        static::load();
        $dir = dirname(__DIR__, 2) . '/storage/framework';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $cacheFile = $dir . '/config.php';
        $export = "<?php\nreturn " . var_export(static::$items, true) . ";\n";
        return file_put_contents($cacheFile, $export) !== false;
    }

    public static function clearCache(): bool
    {
        $cacheFile = dirname(__DIR__, 2) . '/storage/framework/config.php';
        if (file_exists($cacheFile)) {
            return unlink($cacheFile);
        }
        return true;
    }

    public static function isCached(): bool
    {
        return file_exists(dirname(__DIR__, 2) . '/storage/framework/config.php');
    }
}

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

function request($key = null, $default = null)
{
    $req = \App\Core\Request::capture();
    if ($key === null) {
        return $req;
    }
    return $req->input($key, $default);
}
