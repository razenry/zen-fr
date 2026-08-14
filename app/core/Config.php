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
if (!defined('DB_HOST')) define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
if (!defined('DB_USER')) define('DB_USER', getenv('DB_USER') ?: 'root');
if (!defined('DB_PASS')) define('DB_PASS', getenv('DB_PASS') ?: '');
if (!defined('DB_NAME')) define('DB_NAME', getenv('DB_NAME') ?: '');

