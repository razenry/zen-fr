<?php

namespace App\Core;

class Gate
{
    protected static array $abilities = [];
    protected static array $policies = [];

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
        $user = $user ?? Auth::user();

        if (isset(static::$abilities[$ability])) {
            return (bool) call_user_func(static::$abilities[$ability], $user, $params);
        }

        // Check Policy if params is object/class
        if (is_object($params)) {
            $modelClass = get_class($params);
            if (isset(static::$policies[$modelClass])) {
                $policy = new static::$policies[$modelClass]();
                if (method_exists($policy, $ability)) {
                    return (bool) $policy->$ability($user, $params);
                }
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
     * Authorize action or throw Exception / 403 response.
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
