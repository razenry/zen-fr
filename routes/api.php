<?php

use App\Core\Route;
use App\Middleware\CorsMiddleware;
use App\Controllers\Api\ProductApiController;

Route::group(['prefix' => '/api/v1', 'middleware' => [CorsMiddleware::class]], function () {
    
    // Health Check Endpoint
    Route::get('/ping', function () {
        if (!headers_sent()) {
            header('Content-Type: application/json');
        }
        echo json_encode(['status' => 'online', 'timestamp' => time()]);
    });

    // Product RESTful API Routes
    Route::get('/products', [ProductApiController::class, 'index'])->name('api.products.index');
    Route::post('/products', [ProductApiController::class, 'store'])->name('api.products.store');
    Route::get('/products/{id}', [ProductApiController::class, 'show'])->name('api.products.show');
    Route::put('/products/{id}', [ProductApiController::class, 'update'])->name('api.products.update');
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy'])->name('api.products.destroy');

});
