<?php

use App\Core\Cache;

test('cache put, get, remember, and forget', function () {
    Cache::flush();

    // Put & Get
    Cache::put('framework_version', '7.0.0', 300);
    expect(Cache::get('framework_version'))->toBe('7.0.0');

    // Has
    expect(Cache::has('framework_version'))->toBeTrue();

    // Remember
    $remembered = Cache::remember('computed_val', 300, function () {
        return 42 * 2;
    });
    expect($remembered)->toBe(84);
    expect(Cache::get('computed_val'))->toBe(84);

    // Increment & Decrement
    Cache::put('counter', 10, 300);
    expect(Cache::increment('counter', 5))->toBe(15);
    expect(Cache::decrement('counter', 2))->toBe(13);

    // Forget
    Cache::forget('framework_version');
    expect(Cache::has('framework_version'))->toBeFalse();

    Cache::flush();
});
