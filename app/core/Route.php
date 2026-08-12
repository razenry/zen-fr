<?php

namespace App\Core;

class Route
{
    private static $routes = [];
    private static $namedRoutes = [];
    private static $lastRouteIndex = null;
    private static $groupPrefix = '';
    private static $groupMiddleware = [];

    public static function get($uri, $callback)
    {
        return self::add('GET', $uri, $callback);
    }

    public static function post($uri, $callback)
    {
        return self::add('POST', $uri, $callback);
    }

    public static function put($uri, $callback)
    {
        return self::add('PUT', $uri, $callback);
    }

    public static function delete($uri, $callback)
    {
        return self::add('DELETE', $uri, $callback);
    }

    public static function patch($uri, $callback)
    {
        return self::add('PATCH', $uri, $callback);
    }

    public static function options($uri, $callback)
    {
        return self::add('OPTIONS', $uri, $callback);
    }

    /**
     * Route Grouping (prefix & middleware)
     */
    public static function group(array $attributes, callable $callback)
    {
        $previousPrefix = self::$groupPrefix;
        $previousMiddleware = self::$groupMiddleware;

        if (isset($attributes['prefix'])) {
            self::$groupPrefix = $previousPrefix . '/' . trim($attributes['prefix'], '/');
        }

        if (isset($attributes['middleware'])) {
            $middlewares = is_array($attributes['middleware']) ? $attributes['middleware'] : [$attributes['middleware']];
            self::$groupMiddleware = array_merge($previousMiddleware, $middlewares);
        }

        call_user_func($callback);

        self::$groupPrefix = $previousPrefix;
        self::$groupMiddleware = $previousMiddleware;
    }

    private static function add($method, $uri, $callback)
    {
        $fullUri = '/' . trim(self::$groupPrefix . '/' . trim($uri, '/'), '/');
        if ($fullUri !== '/' && str_ends_with($uri, '/')) {
            $fullUri .= '/';
        }

        $originalUri = $fullUri;
        $regexUri = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_\-]+)', $fullUri);

        self::$routes[] = [
            'method'       => strtoupper($method),
            'uri'          => '#^' . $regexUri . '$#',
            'original_uri' => $originalUri,
            'callback'     => $callback,
            'middleware'   => self::$groupMiddleware
        ];
        
        self::$lastRouteIndex = count(self::$routes) - 1;
        return new static();
    }

    public function name($name)
    {
        if (self::$lastRouteIndex !== null) {
            self::$namedRoutes[$name] = self::$routes[self::$lastRouteIndex]['original_uri'];
        }
        return $this;
    }

    public static function getUrl($name, $params = [])
    {
        if (!isset(self::$namedRoutes[$name])) {
            throw new \Exception("Route name '{$name}' not found.");
        }
        
        $uri = self::$namedRoutes[$name];
        foreach ($params as $key => $value) {
            $uri = str_replace('{' . $key . '}', $value, $uri);
        }
        
        return baseUrl($uri);
    }

    public static function resolve()
    {
        $uri = isset($_GET['url']) ? '/' . rtrim($_GET['url'], '/') : '/';
        
        // Handle Method Override (e.g., _method=PUT in POST forms or headers)
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        } elseif (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            $method = strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        }

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && preg_match($route['uri'], $uri, $matches)) {
                array_shift($matches); // Remove the full match

                // Execute Middlewares if present
                if (!empty($route['middleware'])) {
                    foreach ($route['middleware'] as $middleware) {
                        if (is_callable($middleware)) {
                            call_user_func($middleware);
                        } elseif (class_exists($middleware) && method_exists($middleware, 'handle')) {
                            call_user_func([$middleware, 'handle']);
                        }
                    }
                }

                if (is_array($route['callback'])) {
                    $controller = new $route['callback'][0]();
                    $action = $route['callback'][1];
                    call_user_func_array([$controller, $action], $matches);
                } elseif (is_callable($route['callback'])) {
                    call_user_func_array($route['callback'], $matches);
                }
                return;
            }
        }

        // 404 Not Found
        // If API request, return JSON 404
        if (str_starts_with($uri, '/api/')) {
            http_response_code(404);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                'success' => false,
                'message' => 'API endpoint not found'
            ]);
            return;
        }

        $error = new \App\Controllers\ErrorController();
        $error->notFound();
    }
}
