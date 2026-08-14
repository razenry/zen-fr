<?php

namespace App\Core;

class Auth
{
    protected static string $defaultGuard = 'web';
    protected static array $userResolver = [];
    protected static array $activeUsers = [];

    /**
     * Set default or specific guard instance.
     */
    public static function guard(?string $name = null): static
    {
        if ($name) {
            static::$defaultGuard = $name;
        }
        return new static();
    }

    /**
     * Check if current guard is authenticated.
     */
    public static function check(?string $guard = null): bool
    {
        return static::user($guard) !== null;
    }

    /**
     * Get authenticated user ID.
     */
    public static function id(?string $guard = null): mixed
    {
        $user = static::user($guard);
        if (is_object($user)) {
            return $user->id ?? $user->user_id ?? null;
        }
        if (is_array($user)) {
            return $user['id'] ?? $user['user_id'] ?? null;
        }
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * Get authenticated user instance.
     */
    public static function user(?string $guard = null): mixed
    {
        $guard = $guard ?? static::$defaultGuard;
        if (isset(static::$activeUsers[$guard])) {
            return static::$activeUsers[$guard];
        }

        if ($guard === 'api') {
            $token = TokenAuth::getToken();
            if ($token) {
                $userData = TokenAuth::validateToken($token);
                if ($userData) {
                    static::$activeUsers['api'] = is_array($userData) ? (object)$userData : $userData;
                    return static::$activeUsers['api'];
                }
            }
            return null;
        }

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        if (isset($_SESSION['user_name'])) {
            return (object) ['id' => $_SESSION['user_id'] ?? 1, 'name' => $_SESSION['user_name']];
        }

        return null;
    }

    /**
     * Set user manually into guard.
     */
    public static function setUser($user, ?string $guard = null): void
    {
        $guard = $guard ?? static::$defaultGuard;
        static::$activeUsers[$guard] = $user;
        if (is_object($user)) {
            $_SESSION['user_id'] = $user->id ?? 1;
            $_SESSION['user_name'] = $user->name ?? 'User';
        }
    }

    /**
     * Login user session.
     */
    public static function login($id, $name = '', ?string $guard = 'web'): void
    {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        static::$activeUsers[$guard] = (object) ['id' => $id, 'name' => $name];
    }

    /**
     * Logout user session.
     */
    public static function logout(?string $guard = null): void
    {
        $guard = $guard ?? static::$defaultGuard;
        unset(static::$activeUsers[$guard]);
        if (session_status() === PHP_SESSION_ACTIVE) {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user']);
        }
    }
}
