<?php

namespace App\Core;

class HttpResponse
{
    protected int $status;
    protected string $body;
    protected array $headers;

    public function __construct(int $status, string $body, array $headers = [])
    {
        $this->status = $status;
        $this->body = $body;
        $this->headers = $headers;
    }

    public function status(): int
    {
        return $this->status;
    }

    public function ok(): bool
    {
        return $this->status === 200;
    }

    public function successful(): bool
    {
        return $this->status >= 200 && $this->status < 300;
    }

    public function failed(): bool
    {
        return $this->status >= 400;
    }

    public function clientError(): bool
    {
        return $this->status >= 400 && $this->status < 500;
    }

    public function serverError(): bool
    {
        return $this->status >= 500;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function json(?string $key = null, mixed $default = null): mixed
    {
        $decoded = json_decode($this->body, true);
        if (!is_array($decoded)) {
            return $default;
        }

        if (is_null($key)) {
            return $decoded;
        }

        return $decoded[$key] ?? $default;
    }

    public function header(string $key): ?string
    {
        $keyLower = strtolower($key);
        foreach ($this->headers as $k => $v) {
            if (strtolower($k) === $keyLower) {
                return is_array($v) ? implode(', ', $v) : (string)$v;
            }
        }
        return null;
    }
}
