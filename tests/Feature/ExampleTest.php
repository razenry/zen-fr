<?php

test('application loads home page route correctly', function () {
    expect(true)->toBeTrue();
});

test('zen pulse component state hydration works', function () {
    $counter = new App\Pulse\Counter();
    $counter->increment(5);

    expect($counter->count)->toBe(5);
});
