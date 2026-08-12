<?php

use App\Core\Hash;
use App\Core\Crypt;
use App\Core\Storage;

test('hash make generates valid password hash and verifies correctly', function () {
    $password = 'SecretPassword123!';
    $hash = Hash::make($password);

    expect($hash)->not->toBeEmpty();
    expect(Hash::check($password, $hash))->toBeTrue();
    expect(Hash::check('WrongPassword', $hash))->toBeFalse();
});

test('crypt encrypt and decrypt string payload successfully', function () {
    $originalText = 'Sensitive Enterprise Data Token 998877';
    $encrypted = Crypt::encrypt($originalText);

    expect($encrypted)->not->toBeEmpty();
    expect($encrypted)->not->toEqual($originalText);

    $decrypted = Crypt::decrypt($encrypted);
    expect($decrypted)->toEqual($originalText);
});

test('storage engine puts, checks existence, gets and deletes files', function () {
    $filename = 'test_sample.txt';
    $content = 'Zen PHP Storage Test Engine';

    $stored = Storage::disk('public')->put($filename, $content);
    expect($stored)->toBeTrue();
    expect(Storage::disk('public')->exists($filename))->toBeTrue();
    expect(Storage::disk('public')->get($filename))->toEqual($content);

    $deleted = Storage::disk('public')->delete($filename);
    expect($deleted)->toBeTrue();
    expect(Storage::disk('public')->exists($filename))->toBeFalse();
});
