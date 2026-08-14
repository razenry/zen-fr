<?php

namespace App\Core;

class Inertia
{
    protected static string $version = '1.0.0';

    /**
     * Set Inertia asset version
     */
    public static function version(string $version): void
    {
        static::$version = $version;
    }

    /**
     * Render an Inertia React response
     */
    public static function render(string $component, array $props = [], string $layout = 'app'): void
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $url = parse_url($uri, PHP_URL_PATH) ?: '/';

        $page = [
            'component' => $component,
            'props'     => $props,
            'url'       => $url,
            'version'   => static::$version,
        ];

        // Check if request is an Inertia AJAX navigation call
        $isInertia = isset($_SERVER['HTTP_X_INERTIA']) && $_SERVER['HTTP_X_INERTIA'] === 'true';

        if ($isInertia) {
            header('Content-Type: application/json');
            header('X-Inertia: true');
            header('Vary: X-Inertia');
            echo json_encode($page);
            exit(0);
        }

        // Standard initial page load HTML rendering
        $jsonPage = htmlspecialchars(json_encode($page), ENT_QUOTES, 'UTF-8');
        $html = '<div id="app" data-page="' . $jsonPage . '"></div>';

        App::Layout($layout, null, [
            'content_html' => $html,
            'page' => $page,
            'component' => $component,
            'props' => $props,
            'title' => $props['title'] ?? 'Zen Framework'
        ]);
    }
}
