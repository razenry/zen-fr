<?php

use App\Core\App;

test('app react container rendering with props serialization', function () {
    ob_start();
    App::React('Pages/Dashboard', ['title' => 'Test Dashboard', 'user_id' => 42]);
    $output = ob_get_clean();

    expect($output)->toContain('id="app"');
    expect($output)->toContain('data-component="Pages/Dashboard"');
    expect($output)->toContain('&quot;title&quot;:&quot;Test Dashboard&quot;');
    expect($output)->toContain('&quot;user_id&quot;:42');
});

test('app vite asset helper includes tailwind cdn fallback', function () {
    $viteHtml = App::Vite(['resources/css/app.css', 'resources/js/app.jsx']);

    expect($viteHtml)->toContain('https://cdn.tailwindcss.com');
    expect($viteHtml)->toContain('resources/js/app.jsx');
});

test('tailwind and vite configuration files exist', function () {
    expect(file_exists(dirname(__DIR__, 2) . '/tailwind.config.js'))->toBeTrue();
    expect(file_exists(dirname(__DIR__, 2) . '/postcss.config.js'))->toBeTrue();
    expect(file_exists(dirname(__DIR__, 2) . '/vite.config.js'))->toBeTrue();
    expect(file_exists(dirname(__DIR__, 2) . '/package.json'))->toBeTrue();
});
