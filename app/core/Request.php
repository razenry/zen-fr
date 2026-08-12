<?php

namespace App\Core;

class Request
{
    protected static $instance;
    protected $get;
    protected $post;
    protected $json;
    protected $files;
    protected $server;
    protected $cookies;
    protected $rawBody;

    public function __construct(array $query = [], array $request = [], array $files = [], array $server = [], array $cookies = [], ?string $rawBody = null)
    {
        $this->get = $query;
        $this->post = $request;
        $this->server = $server;
        $this->cookies = $cookies;
        $this->rawBody = $rawBody ?? file_get_contents('php://input');

        $this->parseJson();
        $this->parseFiles($files);
    }

    public static function capture(): self
    {
        if (!static::$instance) {
            static::$instance = new static($_GET, $_POST, $_FILES, $_SERVER, $_COOKIE);
        }
        return static::$instance;
    }

    public static function setInstance(self $request): void
    {
        static::$instance = $request;
    }

    protected function parseJson(): void
    {
        $this->json = [];
        if (!empty($this->rawBody)) {
            $decoded = json_decode($this->rawBody, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $this->json = $decoded;
            }
        }
    }

    protected function parseFiles(array $files): void
    {
        $this->files = [];
        foreach ($files as $key => $fileData) {
            if (is_array($fileData) && isset($fileData['tmp_name'])) {
                $this->files[$key] = new UploadedFile($fileData);
            }
        }
    }

    public function input($key = null, $default = null)
    {
        $all = array_merge($this->get, $this->post, $this->json);
        if ($key === null) {
            return $all;
        }

        return $all[$key] ?? $default;
    }

    public function all(): array
    {
        return array_merge($this->get, $this->post, $this->json);
    }

    public function get(string $key, $default = null)
    {
        return $this->get[$key] ?? $default;
    }

    public function post(string $key, $default = null)
    {
        return $this->post[$key] ?? $default;
    }

    public function json(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $this->json;
        }
        return $this->json[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        $all = $this->all();
        return isset($all[$key]);
    }

    public function filled(string $key): bool
    {
        $value = $this->input($key);
        return $value !== null && $value !== '';
    }

    public function only(array $keys): array
    {
        $all = $this->all();
        $results = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $all)) {
                $results[$key] = $all[$key];
            }
        }
        return $results;
    }

    public function except(array $keys): array
    {
        $all = $this->all();
        foreach ($keys as $key) {
            unset($all[$key]);
        }
        return $all;
    }

    public function method(): string
    {
        $method = $this->server['REQUEST_METHOD'] ?? 'GET';
        if ($method === 'POST' && isset($this->post['_method'])) {
            return strtoupper($this->post['_method']);
        }
        return strtoupper($method);
    }

    public function isMethod(string $method): bool
    {
        return $this->method() === strtoupper($method);
    }

    public function path(): string
    {
        $url = $this->get['url'] ?? '/';
        return '/' . trim($url, '/');
    }

    public function url(): string
    {
        return baseUrl($this->path());
    }

    public function header(string $key, $default = null)
    {
        $normalizedKey = 'HTTP_' . strtoupper(str_replace('-', '_', $key));
        if (isset($this->server[$normalizedKey])) {
            return $this->server[$normalizedKey];
        }
        if (isset($this->server[$key])) {
            return $this->server[$key];
        }
        return $default;
    }

    public function headers(): array
    {
        $headers = [];
        foreach ($this->server as $key => $value) {
            if (str_starts_with($key, 'HTTP_')) {
                $headerName = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
                $headers[$headerName] = $value;
            }
        }
        return $headers;
    }

    public function ip(): string
    {
        return $this->server['HTTP_CLIENT_IP'] ?? $this->server['HTTP_X_FORWARDED_FOR'] ?? $this->server['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    public function userAgent(): string
    {
        return $this->server['HTTP_USER_AGENT'] ?? '';
    }

    public function isJson(): bool
    {
        return str_contains($this->header('Content-Type', ''), 'application/json');
    }

    public function wantsJson(): bool
    {
        return str_contains($this->header('Accept', ''), 'application/json');
    }

    public function isAjax(): bool
    {
        return strtolower($this->header('X-Requested-With', '')) === 'xmlhttprequest';
    }

    public function file(string $key): ?UploadedFile
    {
        return $this->files[$key] ?? null;
    }

    public function validate(array $rules): Validator
    {
        return Validator::make($this->all(), $rules);
    }
}
