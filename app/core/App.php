<?php

namespace App\Core;

class App
{
    /**
     * View rendering methods
     */
    public static function View($view, $data = [])
    {
        extract($data);
        $viewPath = 'app/views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            throw new \Exception("View file '$view' not found.");
        }
    }

    public static function Component($component, $data = [])
    {
        extract($data);
        $componentPath = 'app/views/components/' . $component . '.php';
        
        if (file_exists($componentPath)) {
            require $componentPath;
        } else {
            throw new \Exception("Component file '$component' not found.");
        }
    }

    public static function Layout($layout, $view = null, $data = [])
    {
        $data['content_view'] = $view;
        extract($data);
        
        $layoutPath = 'app/views/layouts/' . $layout . '.php';
        
        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            throw new \Exception("Layout file '$layout' not found.");
        }
    }

    /**
     * Render React 18 / SPA component container with props
     */
    public static function React(string $component, array $props = [], string $layout = 'app'): void
    {
        $jsonProps = htmlspecialchars(json_encode($props), ENT_QUOTES, 'UTF-8');
        $html = '<div id="app" data-component="' . htmlspecialchars($component) . '" data-props="' . $jsonProps . '"></div>';
        
        static::Layout($layout, null, [
            'content_html' => $html,
            'component' => $component,
            'props' => $props,
        ]);
    }

    /**
     * Render Vite assets (HMR dev client or compiled assets) & Tailwind CDN fallback
     */
    public static function Vite(array|string $entrypoints = ['resources/css/app.css', 'resources/js/app.jsx']): string
    {
        $entrypoints = is_array($entrypoints) ? $entrypoints : [$entrypoints];
        $isDev = getenv('APP_ENV') === 'local' || getenv('VITE_DEV') === 'true' || file_exists(dirname(__DIR__, 2) . '/hot');
        $base = function_exists('baseUrl') ? baseUrl('') : '';

        $html = '';
        if ($isDev) {
            $viteDevUrl = getenv('VITE_DEV_SERVER') ?: 'http://localhost:5173';
            $html .= '<script type="module" src="' . $viteDevUrl . '/@vite/client"></script>' . "\n";
            foreach ($entrypoints as $entry) {
                if (str_ends_with($entry, '.css')) {
                    $html .= '<link rel="stylesheet" href="' . $viteDevUrl . '/' . ltrim($entry, '/') . '">' . "\n";
                } else {
                    $html .= '<script type="module" src="' . $viteDevUrl . '/' . ltrim($entry, '/') . '"></script>' . "\n";
                }
            }
        } else {
            foreach ($entrypoints as $entry) {
                if (str_ends_with($entry, '.css')) {
                    $html .= '<link rel="stylesheet" href="' . rtrim($base, '/') . '/public/build/' . ltrim($entry, '/') . '">' . "\n";
                } else {
                    $html .= '<script type="module" src="' . rtrim($base, '/') . '/public/build/' . ltrim($entry, '/') . '"></script>' . "\n";
                }
            }
        }

        $html .= '<script src="https://cdn.tailwindcss.com"></script>' . "\n";

        return $html;
    }
}
