<?php

use App\Services\UserService;
use App\Repositories\UserRepository;

test('register user validation returns error when fields are empty', function () {
    $userService = new UserService();
    $result = $userService->registerUser([
        'name' => '',
        'email' => '',
        'password' => ''
    ]);

    expect($result)->toBeArray();
    expect($result['status'])->toBeFalse();
    expect($result['message'])->toBe('Semua field wajib diisi.');
});

test('authenticate user returns error for invalid credentials', function () {
    $userRepo = new class extends UserRepository {
        public function findByEmail(string $email) {
            return null;
        }
    };

    $userService = new UserService($userRepo);
    $result = $userService->authenticate('invalid@example.com', 'secret');

    expect($result['status'])->toBeFalse();
    expect($result['message'])->toBe('Email atau password salah.');
});
