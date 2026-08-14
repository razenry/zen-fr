<?php

namespace App\Core;

class Cache
{
    protected static array $memoryStore = [];

    protected static function getStoragePath(): string
    {
        $dir = dirname(__DIR__, 2) . '/storage/framework/cache';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

    protected static function getFilePath(string $key): string
    {
        return static::getStoragePath() . '/' . md5($key) . '.cache';
    }

    /**
     * Store an item in the cache.
     */
    public static function put(string $key, mixed $value, int $ttlInSeconds = 3600): bool
    {
        $expiresAt = time() + $ttlInSeconds;
        $data = serialize([
            'expires_at' => $expiresAt,
            'value' => $value,
        ]);

        static::$memoryStore[$key] = [
            'expires_at' => $expiresAt,
            'value' => $value,
        ];

        return file_put_contents(static::getFilePath($key), $data) !== false;
    }

    /**
     * Retrieve an item from the cache.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        // Memory check
        if (isset(static::$memoryStore[$key])) {
            if (static::$memoryStore[$key]['expires_at'] >= time()) {
                return static::$memoryStore[$key]['value'];
            }
            unset(static::$memoryStore[$key]);
        }

        // File check
        $filePath = static::getFilePath($key);
        if (!file_exists($filePath)) {
            return $default;
        }

        $raw = file_get_contents($filePath);
        if ($raw === false) {
            return $default;
        }

        $payload = @unserialize($raw);
        if (!is_array($payload) || !isset($payload['expires_at'])) {
            return $default;
        }

        if (time() > $payload['expires_at']) {
            static::forget($key);
            return $default;
        }

        static::$memoryStore[$key] = $payload;
        return $payload['value'];
    }

    /**
     * Check if key exists in cache.
     */
    public static function has(string $key): bool
    {
        return static::get($key) !== null;
    }

    /**
     * Get an item from cache, or execute closure and store result.
     */
    public static function remember(string $key, int $ttlInSeconds, callable $callback): mixed
    {
        $value = static::get($key);
        if ($value !== null) {
            return $value;
        }

        $value = call_user_func($callback);
        static::put($key, $value, $ttlInSeconds);
        return $value;
    }

    /**
     * Remove an item from the cache.
     */
    public static function forget(string $key): bool
    {
        unset(static::$memoryStore[$key]);
        $filePath = static::getFilePath($key);
        if (file_exists($filePath)) {
            return @unlink($filePath);
        }
        return true;
    }

    /**
     * Flush all cached items.
     */
    public static function flush(): bool
    {
        static::$memoryStore = [];
        $dir = static::getStoragePath();
        $files = glob($dir . '/*.cache');
        if ($files) {
            foreach ($files as $file) {
                @unlink($file);
            }
        }
        return true;
    }

    /**
     * Increment an integer value in the cache.
     */
    public static function increment(string $key, int $value = 1): int
    {
        $current = (int) static::get($key, 0);
        $new = $current + $value;
        static::put($key, $new, 86400 * 30);
        return $new;
    }

    /**
     * Decrement an integer value in the cache.
     */
    public static function decrement(string $key, int $value = 1): int
    {
        return static::increment($key, -$value);
    }
}
