<?php

namespace App\Core;

abstract class ViewComponent
{
    protected array $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    abstract public function render(): string;

    /**
     * Parse directives on a raw template string.
     */
    public static function evaluateDirectives(string $template, array $data = []): string
    {
        // @auth ... @endauth
        $template = preg_replace_callback('/@auth\s*(.*?)\s*@endauth/s', function ($m) {
            return Auth::check() ? $m[1] : '';
        }, $template);

        // @guest ... @endguest
        $template = preg_replace_callback('/@guest\s*(.*?)\s*@endguest/s', function ($m) {
            return !Auth::check() ? $m[1] : '';
        }, $template);

        // @can('ability', $params) ... @endcan
        $template = preg_replace_callback('/@can\(\'([^\']+)\'(?:,\s*\$([a-zA-Z0-9_]+))?\)\s*(.*?)\s*@endcan/s', function ($m) use ($data) {
            $ability = $m[1];
            $varName = $m[2] ?? null;
            $params = $varName ? ($data[$varName] ?? null) : null;
            return Gate::allows($ability, Auth::user(), $params) ? $m[3] : '';
        }, $template);

        // @cannot('ability', $params) ... @endcannot
        $template = preg_replace_callback('/@cannot\(\'([^\']+)\'(?:,\s*\$([a-zA-Z0-9_]+))?\)\s*(.*?)\s*@endcannot/s', function ($m) use ($data) {
            $ability = $m[1];
            $varName = $m[2] ?? null;
            $params = $varName ? ($data[$varName] ?? null) : null;
            return Gate::denies($ability, Auth::user(), $params) ? $m[3] : '';
        }, $template);

        return $template;
    }
}
