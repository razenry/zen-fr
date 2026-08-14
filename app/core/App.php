<?php

namespace App\Core;

class App
{
    protected static function getBasePath(): string
    {
        return dirname(__DIR__, 2);
    }

    /**
     * View rendering methods
     */
    public static function View($view, $data = [])
    {
        extract($data);
        $cleanView = str_replace('.', '/', $view);
        $viewPath = static::getBasePath() . '/app/views/' . $cleanView . '.php';
        
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            throw new \Exception("View file '$view' not found at [$viewPath].");
        }
    }

    public static function Component($component, $data = [])
    {
        extract($data);
        $cleanComponent = str_replace('.', '/', $component);
        $componentPath = static::getBasePath() . '/app/views/components/' . $cleanComponent . '.php';
        
        if (file_exists($componentPath)) {
            require $componentPath;
        } else {
            throw new \Exception("Component file '$component' not found at [$componentPath].");
        }
    }

    public static function Layout($layout, $view = null, $data = [])
    {
        $data['content_view'] = $view;
        extract($data);
        
        $cleanLayout = str_replace('.', '/', $layout);
        $layoutPath = static::getBasePath() . '/app/views/layouts/' . $cleanLayout . '.php';
        
        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            throw new \Exception("Layout file '$layout' not found at [$layoutPath].");
        }
    }

    /**
     * Render React 18 / Inertia SPA component container with props
     */
    public static function React(string $component, array $props = [], string $layout = 'app'): void
    {
        Inertia::render($component, $props, $layout);
    }

    /**
     * Render Vite assets (HMR dev client or compiled assets) & Tailwind CDN fallback
     */
    public static function Vite(array|string $entrypoints = ['resources/css/app.css', 'resources/js/app.jsx']): string
    {
        $entrypoints = is_array($entrypoints) ? $entrypoints : [$entrypoints];
        $rootDir = dirname(__DIR__, 2);
        
        $isDev = getenv('APP_ENV') === 'local' || 
                 getenv('VITE_DEV') === 'true' || 
                 file_exists($rootDir . '/hot') ||
                 !file_exists($rootDir . '/public/build/manifest.json');

        $base = function_exists('baseUrl') ? baseUrl('') : '';

        $html = '';
        if ($isDev) {
            $viteDevUrl = getenv('VITE_DEV_SERVER') ?: 'http://localhost:5173';
            if (file_exists($rootDir . '/hot')) {
                $customHot = trim(file_get_contents($rootDir . '/hot'));
                if (!empty($customHot)) {
                    $viteDevUrl = $customHot;
                }
            }

            $html .= '<script type="module" src="' . $viteDevUrl . '/@vite/client"></script>' . "\n";
            $html .= '<script type="module">
  import RefreshRuntime from "' . $viteDevUrl . '/@react-refresh";
  RefreshRuntime.injectIntoGlobalHook(window);
  window.$RefreshReg$ = () => {};
  window.$RefreshSig$ = () => (type) => type;
  window.__vite_plugin_react_preamble_installed__ = true;
</script>' . "\n";

            foreach ($entrypoints as $entry) {
                if (str_ends_with($entry, '.css')) {
                    $html .= '<link rel="stylesheet" href="' . $viteDevUrl . '/' . ltrim($entry, '/') . '">' . "\n";
                } else {
                    $html .= '<script type="module" src="' . $viteDevUrl . '/' . ltrim($entry, '/') . '"></script>' . "\n";
                }
            }
        } else {
            $manifestFile = $rootDir . '/public/build/manifest.json';
            $manifest = file_exists($manifestFile) ? json_decode(file_get_contents($manifestFile), true) : [];

            foreach ($entrypoints as $entry) {
                $cleanEntry = ltrim($entry, '/');
                $file = $manifest[$cleanEntry]['file'] ?? $cleanEntry;

                if (str_ends_with($entry, '.css')) {
                    $html .= '<link rel="stylesheet" href="' . rtrim($base, '/') . '/public/build/' . $file . '">' . "\n";
                } else {
                    $html .= '<script type="module" src="' . rtrim($base, '/') . '/public/build/' . $file . '"></script>' . "\n";
                }
            }
        }

        return $html;
    }
}
