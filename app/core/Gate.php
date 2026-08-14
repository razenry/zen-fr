<?php

namespace App\Core;

class Gate
{
    protected static array $abilities = [];
    protected static array $policies = [];
    protected mixed $userOverride = null;

    public function __construct(mixed $user = null)
    {
        $this->userOverride = $user;
    }

    /**
     * Create Gate instance bound to a specific user.
     */
    public static function forUser(mixed $user): static
    {
        return new static($user);
    }

    /**
     * Define an ability.
     */
    public static function define(string $ability, callable $callback): void
    {
        static::$abilities[$ability] = $callback;
    }

    /**
     * Map a model class to a policy class.
     */
    public static function policy(string $modelClass, string $policyClass): void
    {
        static::$policies[$modelClass] = $policyClass;
    }

    /**
     * Check if user is allowed to perform ability.
     */
    public static function allows(string $ability, mixed $user = null, mixed $params = null): bool
    {
        $instance = new static();
        $user = $user ?? $instance->userOverride ?? Auth::user();

        if (isset(static::$abilities[$ability])) {
            return (bool) call_user_func(static::$abilities[$ability], $user, $params);
        }

        // Check Policy if params is object or class string
        $targetClass = is_object($params) ? get_class($params) : (is_string($params) ? $params : null);
        if ($targetClass && isset(static::$policies[$targetClass])) {
            $policyClass = static::$policies[$targetClass];
            $policy = new $policyClass();

            if (method_exists($policy, 'before')) {
                $before = $policy->before($user, $ability, $params);
                if (!is_null($before)) {
                    return (bool) $before;
                }
            }

            if (method_exists($policy, $ability)) {
                return (bool) $policy->$ability($user, $params);
            }
        }

        return false;
    }

    /**
     * Check if user is denied to perform ability.
     */
    public static function denies(string $ability, mixed $user = null, mixed $params = null): bool
    {
        return !static::allows($ability, $user, $params);
    }

    /**
     * Authorize action or throw 403 Exception.
     */
    public static function authorize(string $ability, mixed $user = null, mixed $params = null): bool
    {
        if (static::denies($ability, $user, $params)) {
            http_response_code(403);
            throw new \Exception("This action is unauthorized. Access denied for ability: {$ability}");
        }
        return true;
    }
}
