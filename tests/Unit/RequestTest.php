<?php

use App\Core\Request;
use App\Core\UploadedFile;

test('request captures query and post data correctly', function () {
    $request = new Request(['search' => 'zen'], ['name' => 'John Doe'], [], ['REQUEST_METHOD' => 'POST']);

    expect($request->get('search'))->toBe('zen');
    expect($request->post('name'))->toBe('John Doe');
    expect($request->input('search'))->toBe('zen');
    expect($request->input('name'))->toBe('John Doe');
    expect($request->has('name'))->toBeTrue();
    expect($request->filled('name'))->toBeTrue();
    $only = $request->only(['search']);
    expect($only['search'])->toBe('zen');

    $except = $request->except(['search']);
    expect($except['name'])->toBe('John Doe');
});

test('request parses json payload body correctly', function () {
    $jsonBody = json_encode(['title' => 'Framework Release', 'status' => 'active']);
    $request = new Request([], [], [], ['REQUEST_METHOD' => 'POST', 'HTTP_CONTENT_TYPE' => 'application/json'], [], $jsonBody);

    expect($request->isJson())->toBeTrue();
    expect($request->json('title'))->toBe('Framework Release');
    expect($request->input('status'))->toBe('active');
});

test('request header and ip detection work correctly', function () {
    $request = new Request([], [], [], [
        'REQUEST_METHOD' => 'GET',
        'REMOTE_ADDR' => '192.168.1.50',
        'HTTP_USER_AGENT' => 'ZenPHPTestClient/1.0',
        'HTTP_X_CUSTOM_HEADER' => 'TestValue'
    ]);

    expect($request->ip())->toBe('192.168.1.50');
    expect($request->userAgent())->toBe('ZenPHPTestClient/1.0');
    expect($request->header('x-custom-header'))->toBe('TestValue');
});

test('request helper function retrieves inputs seamlessly', function () {
    $req = new Request(['query_param' => 'hello'], ['post_param' => 'world']);
    Request::setInstance($req);

    expect(request('query_param'))->toBe('hello');
    expect(request('post_param'))->toBe('world');
    expect(request()->method())->toBe('GET');
});

test('uploaded file wrapper validates properties correctly', function () {
    $file = new UploadedFile([
        'name' => 'document.pdf',
        'type' => 'application/pdf',
        'tmp_name' => '/tmp/php1234.tmp',
        'error' => UPLOAD_ERR_OK,
        'size' => 1024
    ]);

    expect($file->getClientOriginalName())->toBe('document.pdf');
    expect($file->getClientOriginalExtension())->toBe('pdf');
    expect($file->getSize())->toBe(1024);
    expect($file->getError())->toBe(0);
});
