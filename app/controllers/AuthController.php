<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\App;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(?UserService $userService = null)
    {
        $this->userService = $userService ?? new UserService();
    }

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirect(route('home'));
        }
        $data['title'] = 'Login';
        App::Layout('main', 'auth/login', $data);
    }

    public function loginProcess()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $result = $this->userService->authenticate($email, $password);

        if ($result['status']) {
            $user = $result['data'];
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['success'] = 'Welcome back, ' . $user->name . '!';
            $this->redirect(route('home'));
        }

        $_SESSION['error'] = $result['message'];
        $this->redirect(route('login'));
    }

    public function register()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirect(route('home'));
        }
        $data['title'] = 'Register';
        App::Layout('main', 'auth/register', $data);
    }

    public function registerProcess()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['password_confirmation'] ?? '';

        if ($password !== $confirm) {
            $_SESSION['error'] = 'Passwords do not match.';
            $this->redirect(route('register'));
        }

        $result = $this->userService->registerUser([
            'name'     => $name,
            'email'    => $email,
            'password' => $password
        ]);

        if ($result['status']) {
            $_SESSION['success'] = $result['message'];
            $this->redirect(route('login'));
        }

        $_SESSION['error'] = $result['message'];
        $this->redirect(route('register'));
    }

    public function logout()
    {
        session_destroy();
        session_start();
        $_SESSION['success'] = 'You have been logged out.';
        $this->redirect(route('login'));
    }
}
