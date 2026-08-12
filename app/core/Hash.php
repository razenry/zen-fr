<?php

namespace App\Core;

class Hash
{
    /**
     * Hash a plain text string using default Bcrypt/Argon2 algorithm.
     *
     * @param string $value
     * @param array $options
     * @return string
     */
    public static function make(string $value, array $options = []): string
    {
        $algo = defined('PASSWORD_ARGON2ID') ? PASSWORD_ARGON2ID : PASSWORD_BCRYPT;
        $hash = password_hash($value, $algo, $options);
        if ($hash === false) {
            throw new \RuntimeException('Failed to generate hash.');
        }
        return $hash;
    }

    /**
     * Check if a plain text string matches a given hash.
     *
     * @param string $value
     * @param string $hashedValue
     * @return bool
     */
    public static function check(string $value, string $hashedValue): bool
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
        return password_verify($value, $hashedValue);
    }

    /**
     * Determine if a given hash needs to be rehashed based on options.
     *
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public static function needsRehash(string $hashedValue, array $options = []): bool
    {
        $algo = defined('PASSWORD_ARGON2ID') ? PASSWORD_ARGON2ID : PASSWORD_BCRYPT;
        return password_needs_rehash($hashedValue, $algo, $options);
    }
}
