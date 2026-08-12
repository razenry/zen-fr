<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected $userRepository;

    public function __construct(?UserRepository $userRepository = null)
    {
        $this->userRepository = $userRepository ?? new UserRepository();
    }

    public function registerUser(array $data)
    {
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            return $this->error('Semua field wajib diisi.');
        }

        $existingUser = $this->userRepository->findByEmail($data['email']);
        if ($existingUser) {
            return $this->error('Email sudah terdaftar.');
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $user = $this->userRepository->create($data);

        return $this->success($user, 'Registrasi berhasil.');
    }

    public function authenticate(string $email, string $password)
    {
        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
            return $this->error('Email atau password salah.');
        }

        if (!password_verify($password, $user->password)) {
            return $this->error('Email atau password salah.');
        }

        return $this->success($user, 'Login berhasil.');
    }
}
