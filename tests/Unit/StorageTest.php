<?php

use App\Core\Storage;
use App\Core\UploadedFile;

test('storage disk put, get, exists, and delete', function () {
    $filename = 'test_file.txt';
    $content = 'Hello Zen PHP v4.0 Storage Engine!';

    // Put file on public disk
    $stored = Storage::disk('public')->put($filename, $content);
    expect($stored)->toBeTrue();

    // Exists check
    expect(Storage::disk('public')->exists($filename))->toBeTrue();

    // Get content
    $readContent = Storage::disk('public')->get($filename);
    expect($readContent)->toBe($content);

    // URL check
    $url = Storage::disk('public')->url($filename);
    expect($url)->toContain('uploads/' . $filename);

    // Temporary URL
    $tempUrl = Storage::disk('public')->temporaryUrl($filename, 60);
    expect($tempUrl)->toContain('expires=');
    expect($tempUrl)->toContain('signature=');

    // Clean up
    $deleted = Storage::disk('public')->delete($filename);
    expect($deleted)->toBeTrue();
    expect(Storage::disk('public')->exists($filename))->toBeFalse();
});

test('uploaded file store and storeAs helpers', function () {
    $tmpFile = tempnam(sys_get_temp_dir(), 'zen_test_');
    file_put_contents($tmpFile, 'Uploaded File Content');

    $uploadedFile = new UploadedFile([
        'name' => 'test_upload.png',
        'type' => 'image/png',
        'tmp_name' => $tmpFile,
        'error' => UPLOAD_ERR_OK,
        'size' => filesize($tmpFile),
    ]);

    expect($uploadedFile->isValid())->toBeTrue();
    expect($uploadedFile->getClientOriginalName())->toBe('test_upload.png');
    expect($uploadedFile->getClientOriginalExtension())->toBe('png');

    $path = $uploadedFile->storeAs('avatars', 'custom_avatar.png', 'public');
    expect($path)->toBe('avatars/custom_avatar.png');
    expect(Storage::disk('public')->exists('avatars/custom_avatar.png'))->toBeTrue();

    // Clean up
    Storage::disk('public')->delete('avatars/custom_avatar.png');
    @unlink($tmpFile);
});
