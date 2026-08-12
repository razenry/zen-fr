<?php

namespace App\Core;

class DotEnv
{
    /**
     * The directory where the .env file can be located.
     *
     * @var string
     */
    protected $path;

    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            $examplePath = dirname($path) . '/.env.example';
            if (file_exists($examplePath)) {
                @copy($examplePath, $path);
            }
        }
        $this->path = file_exists($path) ? $path : (file_exists(dirname($path) . '/.env.example') ? dirname($path) . '/.env.example' : $path);
    }

    public function load(): void
    {
        if (!file_exists($this->path) || !is_readable($this->path)) {
            return;
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}
