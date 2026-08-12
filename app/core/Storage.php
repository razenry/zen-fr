<?php

namespace App\Core;

class Storage
{
    protected static $disk = 'public';

    public static function disk(string $name = 'public')
    {
        $instance = new static();
        static::$disk = $name;
        return $instance;
    }

    protected static function getBasePath(): string
    {
        $baseDir = dirname(__DIR__, 2);
        if (static::$disk === 'public') {
            return $baseDir . '/public/uploads';
        }
        return $baseDir . '/storage/app';
    }

    public static function put(string $path, string $contents): bool
    {
        $fullPath = self::getBasePath() . '/' . ltrim($path, '/');
        $dir = dirname($fullPath);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return file_put_contents($fullPath, $contents) !== false;
    }

    public static function get(string $path): ?string
    {
        $fullPath = self::getBasePath() . '/' . ltrim($path, '/');
        if (file_exists($fullPath) && is_readable($fullPath)) {
            return file_get_contents($fullPath);
        }
        return null;
    }

    public static function exists(string $path): bool
    {
        return file_exists(self::getBasePath() . '/' . ltrim($path, '/'));
    }

    public static function delete(string $path): bool
    {
        $fullPath = self::getBasePath() . '/' . ltrim($path, '/');
        if (file_exists($fullPath)) {
            return @unlink($fullPath);
        }
        return false;
    }

    public static function url(string $path): string
    {
        return baseUrl('uploads/' . ltrim($path, '/'));
    }
}
