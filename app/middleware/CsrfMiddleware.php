<?php

namespace App\Middleware;

class CsrfMiddleware
{
    public function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Generate CSRF token if not present
        if (empty($_SESSION['_csrf_token'])) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }

        $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');

        if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            $token = $_POST['_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;

            if (!$token || !hash_equals($_SESSION['_csrf_token'], $token)) {
                http_response_code(419);
                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'CSRF Token Mismatch / Session Expired', 'status' => 419]);
                } else {
                    echo '<!DOCTYPE html><html><head><title>419 Page Expired</title><style>body{font-family:sans-serif;text-align:center;padding:100px;background:#f8fafc;color:#334155;}h1{font-size:3rem;margin-bottom:0.5rem;}p{color:#64748b;}</style></head><body><h1>419</h1><p>Page Expired / CSRF Token Mismatch. Please refresh and try again.</p></body></html>';
                }
                exit;
            }
        }
    }
}
