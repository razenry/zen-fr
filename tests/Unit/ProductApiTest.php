<?php

use App\Controllers\Api\ProductApiController;

test('product api index returns json success response with products', function () {
    $controller = new ProductApiController();
    
    ob_start();
    $response = $controller->index();
    ob_end_clean();

    expect($response)->toBeArray();
    expect($response['success'])->toBeTrue();
    expect($response['data'])->toBeArray();
});

test('product api show returns product details when found', function () {
    $controller = new ProductApiController();

    ob_start();
    $response = $controller->show(1);
    ob_end_clean();

    expect($response)->toBeArray();
    expect($response['success'])->toBeTrue();
    expect($response['data'])->toHaveKey('id');
    expect($response['data']['id'])->toBe(1);
});

test('product api show returns not found for invalid id', function () {
    $controller = new ProductApiController();

    ob_start();
    $response = $controller->show(999999);
    ob_end_clean();

    expect($response)->toBeArray();
    expect($response['success'])->toBeFalse();
    expect($response['message'])->toBe('Product not found');
});

test('product api store validates required fields', function () {
    $_POST = [];
    $controller = new ProductApiController();

    ob_start();
    $response = $controller->store();
    ob_end_clean();

    expect($response)->toBeArray();
    expect($response['success'])->toBeFalse();
    expect($response['errors'])->toHaveKey('name');
});
