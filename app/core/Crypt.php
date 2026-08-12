<?php

namespace App\Core;

class Crypt
{
    private static function getKey(): string
    {
        $key = getenv('APP_KEY') ?: 'base64:ZenPHPDefaultKey32BytesLength!!';
        if (strpos($key, 'base64:') === 0) {
            $key = base64_decode(substr($key, 7));
        }
        return substr(hash('sha256', $key, true), 0, 32);
    }

    /**
     * Encrypt a string using AES-256-CBC.
     *
     * @param string $value
     * @return string
     */
    public static function encrypt(string $value): string
    {
        $key = self::getKey();
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($value, 'aes-256-cbc', $key, 0, $iv);

        $mac = hash_hmac('sha256', $iv . $encrypted, $key);
        $payload = [
            'iv' => base64_encode($iv),
            'value' => $encrypted,
            'mac' => $mac
        ];

        return base64_encode(json_encode($payload));
    }

    /**
     * Decrypt an encrypted string payload.
     *
     * @param string $payload
     * @return string
     */
    public static function decrypt(string $payload): string
    {
        $key = self::getKey();
        $decoded = json_decode(base64_decode($payload), true);

        if (!is_array($decoded) || !isset($decoded['iv'], $decoded['value'], $decoded['mac'])) {
            throw new \InvalidArgumentException('The payload is invalid.');
        }

        $iv = base64_decode($decoded['iv']);
        $encrypted = $decoded['value'];
        $mac = $decoded['mac'];

        $calculatedMac = hash_hmac('sha256', $iv . $encrypted, $key);
        if (!hash_equals($calculatedMac, $mac)) {
            throw new \RuntimeException('The MAC is invalid / payload tampered.');
        }

        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
        if ($decrypted === false) {
            throw new \RuntimeException('Could not decrypt data.');
        }

        return $decrypted;
    }
}
