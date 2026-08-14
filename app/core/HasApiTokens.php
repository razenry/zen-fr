<?php

namespace App\Core;

trait HasApiTokens
{
    protected array $apiTokens = [];
    protected ?array $currentToken = null;

    /**
     * Create a new API token for the model.
     */
    public function createToken(string $name, array $abilities = ['*']): string
    {
        $plainToken = bin2hex(random_bytes(20));
        $hash = hash('sha256', $plainToken);

        $tokenData = [
            'name' => $name,
            'token' => $hash,
            'abilities' => $abilities,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->apiTokens[] = $tokenData;
        $this->currentToken = $tokenData;

        return $plainToken;
    }

    /**
     * Get all API tokens for model.
     */
    public function tokens(): array
    {
        return $this->apiTokens;
    }

    /**
     * Set current active token metadata.
     */
    public function withAccessToken(array $token): static
    {
        $this->currentToken = $token;
        return $this;
    }

    /**
     * Check if current token has ability.
     */
    public function tokenCan(string $ability): bool
    {
        if (!$this->currentToken) {
            return true;
        }

        $abilities = $this->currentToken['abilities'] ?? ['*'];
        if (in_array('*', $abilities, true)) {
            return true;
        }

        return in_array($ability, $abilities, true);
    }
}
