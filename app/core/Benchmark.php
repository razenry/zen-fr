<?php

namespace App\Core;

class Benchmark
{
    private static $startTime = null;
    private static $startMemory = null;

    public static function start(): void
    {
        self::$startTime = microtime(true);
        self::$startMemory = memory_get_usage();
    }

    public static function elapsed(int $decimals = 4): float
    {
        $start = self::$startTime ?? ($_SERVER['REQUEST_TIME_FLOAT'] ?? microtime(true));
        return round(microtime(true) - $start, $decimals);
    }

    public static function memory(): string
    {
        $bytes = memory_get_peak_usage(true);
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
