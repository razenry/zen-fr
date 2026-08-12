<?php

use App\Core\Route;
use App\Core\Benchmark;
use App\Middleware\SecurityHeadersMiddleware;

test('route caching engine generates and clears cache file', function () {
    Route::clearCache();
    expect(Route::isCached())->toBeFalse();

    $cached = Route::cache();
    expect($cached)->toBeTrue();
    expect(Route::isCached())->toBeTrue();

    $cleared = Route::clearCache();
    expect($cleared)->toBeTrue();
    expect(Route::isCached())->toBeFalse();
});

test('benchmark utility tracks elapsed execution time and peak memory', function () {
    Benchmark::start();
    usleep(5000); // 5ms sleep

    $elapsed = Benchmark::elapsed();
    $memory = Benchmark::memory();

    expect($elapsed)->toBeGreaterThan(0);
    expect($memory)->not->toBeEmpty();
});

test('security headers middleware executes without error', function () {
    $middleware = new SecurityHeadersMiddleware();
    $middleware->handle();
    expect(true)->toBeTrue();
});
