<?php

use App\Core\Collection;

test('collection initializes with array and provides array access', function () {
    $data = [
        ['id' => 1, 'name' => 'Alice', 'role' => 'admin', 'deleted_at' => null],
        ['id' => 2, 'name' => 'Bob', 'role' => 'user', 'deleted_at' => '2026-08-12 10:00:00'],
        ['id' => 3, 'name' => 'Charlie', 'role' => 'user', 'deleted_at' => null]
    ];

    $collection = new Collection($data);

    expect($collection->count())->toBe(3);
    expect($collection[0]['name'])->toBe('Alice');
    expect(isset($collection[1]))->toBeTrue();
    expect($collection->isEmpty())->toBeFalse();
});

test('collection filter map and pluck work correctly', function () {
    $data = [
        ['id' => 10, 'name' => 'Widget A', 'price' => 100],
        ['id' => 20, 'name' => 'Widget B', 'price' => 250],
        ['id' => 30, 'name' => 'Widget C', 'price' => 150]
    ];

    $collection = Collection::make($data);

    $expensiveNames = $collection
        ->filter(fn($item) => $item['price'] > 120)
        ->pluck('name')
        ->all();

    expect($expensiveNames)->toBe(['Widget B', 'Widget C']);

    $pricesWithTax = $collection->map(fn($item) => (float)round($item['price'] * 1.1, 2))->all();
    expect($pricesWithTax)->toBe([110.0, 275.0, 165.0]);
});

test('collection soft delete filtering operates properly', function () {
    $data = [
        ['id' => 1, 'title' => 'Post 1', 'deleted_at' => null],
        ['id' => 2, 'title' => 'Post 2', 'deleted_at' => '2026-08-10 12:00:00'],
        ['id' => 3, 'title' => 'Post 3', 'deleted_at' => null]
    ];

    $collection = new Collection($data);

    $onlyTrashed = $collection->onlyTrashed()->pluck('title')->all();
    expect($onlyTrashed)->toBe(['Post 2']);

    $withoutTrashed = $collection->withoutTrashed()->pluck('title')->all();
    expect($withoutTrashed)->toBe(['Post 1', 'Post 3']);

    expect($collection->withTrashed()->count())->toBe(3);
});

test('collection converts to array and json accurately', function () {
    $data = [
        ['id' => 1, 'category' => 'tech'],
        ['id' => 2, 'category' => 'design']
    ];

    $collection = new Collection($data);

    expect($collection->toArray())->toBe($data);
    expect($collection->toJson())->toBe(json_encode($data));
});
