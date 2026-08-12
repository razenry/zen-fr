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
    if ($envBase && $envBase !== 'http://localhost' && $envBase !== 'http://localhost/') {
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
