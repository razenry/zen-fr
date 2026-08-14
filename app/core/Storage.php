<?php

namespace App\Core;

class Storage
{
    protected string $selectedDisk;

    public function __construct(string $disk = 'public')
    {
        $this->selectedDisk = $disk;
    }

    /**
     * Create a disk instance.
     */
    public static function disk(string $name = 'public'): static
    {
        return new static($name);
    }

    /**
     * Get the root filesystem path for the current disk.
     */
    public function getBasePath(): string
    {
        $baseDir = dirname(__DIR__, 2);
        return match ($this->selectedDisk) {
            'public' => $baseDir . '/public/uploads',
            'local', 'private' => $baseDir . '/storage/app',
            's3', 'cloud' => $baseDir . '/storage/app/cloud',
            default => $baseDir . '/storage/app/' . $this->selectedDisk,
        };
    }

    /**
     * Write content to a file.
     */
    public function put(string $path, string $contents): bool
    {
        $fullPath = $this->getBasePath() . '/' . ltrim($path, '/');
        $dir = dirname($fullPath);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return file_put_contents($fullPath, $contents) !== false;
    }

    /**
     * Read content from a file.
     */
    public function get(string $path): ?string
    {
        $fullPath = $this->getBasePath() . '/' . ltrim($path, '/');
        if (file_exists($fullPath) && is_readable($fullPath)) {
            return file_get_contents($fullPath);
        }
        return null;
    }

    /**
     * Check if a file exists.
     */
    public function exists(string $path): bool
    {
        return file_exists($this->getBasePath() . '/' . ltrim($path, '/'));
    }

    /**
     * Delete a file.
     */
    public function delete(string $path): bool
    {
        $fullPath = $this->getBasePath() . '/' . ltrim($path, '/');
        if (file_exists($fullPath)) {
            return @unlink($fullPath);
        }
        return false;
    }

    /**
     * Get the public URL for a file.
     */
    public function url(string $path): string
    {
        $path = ltrim($path, '/');
        if ($this->selectedDisk === 'public') {
            return baseUrl('uploads/' . $path);
        }
        return baseUrl('storage/' . $this->selectedDisk . '/' . $path);
    }

    /**
     * Generate a signed/temporary URL for private files.
     */
    public function temporaryUrl(string $path, int $expirationInSeconds = 1800): string
    {
        $expires = time() + $expirationInSeconds;
        $signature = hash_hmac('sha256', $path . '|' . $expires, $_ENV['APP_KEY'] ?? 'zen_secret_key');
        return $this->url($path) . '?expires=' . $expires . '&signature=' . $signature;
    }

    /**
     * Get file size in bytes.
     */
    public function size(string $path): int
    {
        $fullPath = $this->getBasePath() . '/' . ltrim($path, '/');
        return file_exists($fullPath) ? filesize($fullPath) : 0;
    }

    /**
     * Get file MIME type.
     */
    public function mimeType(string $path): string
    {
        $fullPath = $this->getBasePath() . '/' . ltrim($path, '/');
        if (file_exists($fullPath) && function_exists('mime_content_type')) {
            return mime_content_type($fullPath) ?: 'application/octet-stream';
        }
        return 'application/octet-stream';
    }

    /**
     * Stream a file download response.
     */
    public function download(string $path, ?string $name = null): void
    {
        $fullPath = $this->getBasePath() . '/' . ltrim($path, '/');
        if (!$this->exists($path)) {
            http_response_code(404);
            echo "File not found.";
            return;
        }

        $filename = $name ?? basename($fullPath);
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $this->mimeType($path));
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fullPath));
        readfile($fullPath);
        exit;
    }

    /**
     * Static magic proxy to handle static calls like Storage::put(), Storage::get(), etc.
     */
    public static function __callStatic(string $method, array $arguments)
    {
        $instance = new static('public');
        return call_user_func_array([$instance, $method], $arguments);
    }
}

