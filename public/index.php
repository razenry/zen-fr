<?php 
session_start();

require_once dirname(__DIR__) . '/app/init.php';

// Global Error/Exception Handler
set_error_handler(function ($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        return;
    }
    throw new \ErrorException($message, 0, $severity, $file, $line);
});

set_exception_handler(function (\Throwable $e) {
    $error = new \App\Controllers\ErrorController();
    $error->serverError($e);
});

// Include web and API routes
require_once dirname(__DIR__) . '/routes/web.php';
require_once dirname(__DIR__) . '/routes/api.php';

use App\Core\Route;

// Resolve the requested route
Route::resolve();
