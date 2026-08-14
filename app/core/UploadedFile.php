<?php

namespace App\Core;

class UploadedFile
{
    protected $name;
    protected $type;
    protected $tmpName;
    protected $error;
    protected $size;

    public function __construct(array $fileData)
    {
        $this->name = $fileData['name'] ?? '';
        $this->type = $fileData['type'] ?? '';
        $this->tmpName = $fileData['tmp_name'] ?? '';
        $this->error = $fileData['error'] ?? UPLOAD_ERR_NO_FILE;
        $this->size = $fileData['size'] ?? 0;
    }

    public function getClientOriginalName(): string
    {
        return $this->name;
    }

    public function getClientOriginalExtension(): string
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    public function getMimeType(): string
    {
        return $this->type;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getError(): int
    {
        return $this->error;
    }

    public function isValid(): bool
    {
        return $this->error === UPLOAD_ERR_OK && (is_uploaded_file($this->tmpName) || file_exists($this->tmpName));
    }

    public function hashName(?string $path = null): string
    {
        $extension = $this->getClientOriginalExtension();
        $filename = bin2hex(random_bytes(16)) . ($extension ? '.' . $extension : '');
        return $path ? trim($path, '/') . '/' . $filename : $filename;
    }

    public function store(string $path = '', string $disk = 'public'): ?string
    {
        if (!$this->isValid()) {
            return null;
        }

        $targetPath = $this->hashName($path);
        $contents = file_get_contents($this->tmpName);
        if ($contents !== false && Storage::disk($disk)->put($targetPath, $contents)) {
            return $targetPath;
        }

        return null;
    }

    public function storeAs(string $path, string $name, string $disk = 'public'): ?string
    {
        if (!$this->isValid()) {
            return null;
        }

        $targetPath = trim($path, '/') . '/' . ltrim($name, '/');
        $contents = file_get_contents($this->tmpName);
        if ($contents !== false && Storage::disk($disk)->put($targetPath, $contents)) {
            return $targetPath;
        }

        return null;
    }

    public function storePublicly(string $path = ''): ?string
    {
        return $this->store($path, 'public');
    }

    public function storePubliclyAs(string $path, string $name): ?string
    {
        return $this->storeAs($path, $name, 'public');
    }
}

