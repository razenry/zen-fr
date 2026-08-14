<?php

namespace App\Middleware;

use App\Core\Cache;
use App\Core\Request;

class RateLimitMiddleware
{
    public function handle(int $maxAttempts = 60, int $decayMinutes = 1): bool
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $key = 'rate_limit:' . md5($ip . ($_SERVER['REQUEST_URI'] ?? '/'));

        $attempts = (int) Cache::get($key, 0);

        if ($attempts >= $maxAttempts) {
            http_response_code(429);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'error' => 'Too Many Requests',
                'message' => "Limit hit ($maxAttempts requests per $decayMinutes min). Please try again later.",
            ]);
            exit;
        }

        Cache::put($key, $attempts + 1, $decayMinutes * 60);
        return true;
    }
}
