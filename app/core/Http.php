<?php

namespace App\Core;

class Http
{
    protected static bool $faking = false;
    protected static array $fakeResponses = [];
    protected static array $recordedRequests = [];

    protected array $headers = ['Accept' => 'application/json'];
    protected int $timeout = 10;

    public static function fake(array|callable|HttpResponse $fakes = []): void
    {
        static::$faking = true;
        static::$fakeResponses = is_array($fakes) ? $fakes : ['*' => $fakes];
        static::$recordedRequests = [];
    }

    public static function isFaking(): bool
    {
        return static::$faking;
    }

    public static function resetFakes(): void
    {
        static::$faking = false;
        static::$fakeResponses = [];
        static::$recordedRequests = [];
    }

    public static function getRecordedRequests(): array
    {
        return static::$recordedRequests;
    }

    public static function withHeaders(array $headers): static
    {
        $instance = new static();
        $instance->headers = array_merge($instance->headers, $headers);
        return $instance;
    }

    public static function withToken(string $token, string $type = 'Bearer'): static
    {
        return static::withHeaders(['Authorization' => trim("{$type} {$token}")]);
    }

    public static function timeout(int $seconds): static
    {
        $instance = new static();
        $instance->timeout = $seconds;
        return $instance;
    }

    public static function get(string $url, array $query = []): HttpResponse
    {
        return (new static())->send('GET', $url, ['query' => $query]);
    }

    public static function post(string $url, array $data = []): HttpResponse
    {
        return (new static())->send('POST', $url, ['json' => $data]);
    }

    public static function put(string $url, array $data = []): HttpResponse
    {
        return (new static())->send('PUT', $url, ['json' => $data]);
    }

    public static function delete(string $url, array $data = []): HttpResponse
    {
        return (new static())->send('DELETE', $url, ['json' => $data]);
    }

    public static function patch(string $url, array $data = []): HttpResponse
    {
        return (new static())->send('PATCH', $url, ['json' => $data]);
    }

    public function __call(string $method, array $args)
    {
        if (in_array($method, ['get', 'post', 'put', 'delete', 'patch'])) {
            $httpMethod = strtoupper($method);
            $url = $args[0] ?? '';
            $data = $args[1] ?? [];
            $options = ($method === 'get') ? ['query' => $data] : ['json' => $data];
            return $this->send($httpMethod, $url, $options);
        }
        throw new \BadMethodCallException("Method {$method} does not exist.");
    }

    public function send(string $method, string $url, array $options = []): HttpResponse
    {
        $query = $options['query'] ?? [];
        if (!empty($query)) {
            $url .= (str_contains($url, '?') ? '&' : '?') . http_build_query($query);
        }

        $payload = $options['json'] ?? null;

        static::$recordedRequests[] = [
            'method' => $method,
            'url' => $url,
            'headers' => $this->headers,
            'payload' => $payload,
        ];

        if (static::$faking) {
            return $this->resolveFakeResponse($url, $method, $payload);
        }

        return $this->executeCurl($method, $url, $payload);
    }

    protected function resolveFakeResponse(string $url, string $method, mixed $payload): HttpResponse
    {
        foreach (static::$fakeResponses as $pattern => $fake) {
            $cleanPattern = str_replace('*', '', (string)$pattern);
            $isMatch = ($pattern === '*') || (fnmatch($pattern, $url)) || (!empty($cleanPattern) && str_contains($url, $cleanPattern));
            if ($isMatch) {
                if ($fake instanceof HttpResponse) {
                    return $fake;
                }
                if (is_callable($fake)) {
                    $result = $fake($url, $method, $payload);
                    return $result instanceof HttpResponse ? $result : new HttpResponse(200, json_encode($result));
                }
                if (is_array($fake)) {
                    return new HttpResponse(200, json_encode($fake));
                }
                return new HttpResponse(200, (string)$fake);
            }
        }

        return new HttpResponse(200, json_encode(['message' => 'Faked default response']));
    }

    protected function executeCurl(string $method, string $url, mixed $payload): HttpResponse
    {
        if (!function_exists('curl_init')) {
            return new HttpResponse(500, json_encode(['error' => 'cURL extension is not enabled']));
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

        $formattedHeaders = [];
        foreach ($this->headers as $key => $val) {
            $formattedHeaders[] = "{$key}: {$val}";
        }

        if ($payload !== null) {
            $jsonString = json_encode($payload);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);
            $formattedHeaders[] = 'Content-Type: application/json';
            $formattedHeaders[] = 'Content-Length: ' . strlen($jsonString);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $formattedHeaders);

        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new HttpResponse($status ?: 200, $body ?: '');
    }
}
