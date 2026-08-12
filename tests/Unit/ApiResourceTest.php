<?php

use App\Core\ApiResource;
use App\Core\Collection;
use App\Resources\ProductResource;

test('api resource collection handles array and collection instance', function () {
    $item1 = (object) ['id' => 1, 'name' => 'Product A', 'price' => 100];
    $item2 = (object) ['id' => 2, 'name' => 'Product B', 'price' => 200];

    $collectionObj = new Collection([$item1, $item2]);

    $resultFromCollection = ProductResource::collection($collectionObj);

    expect($resultFromCollection)->toBeArray();
    expect(count($resultFromCollection))->toBe(2);
    expect($resultFromCollection[0]['name'])->toBe('Product A');
    expect($resultFromCollection[1]['price'])->toBe(200);

    $arrayInput = [$item1, $item2];
    $resultFromArray = ProductResource::collection($arrayInput);

    expect($resultFromArray)->toBeArray();
    expect(count($resultFromArray))->toBe(2);
    expect($resultFromArray[0]['name'])->toBe('Product A');
});

test('api resource make handles single item and collection', function () {
    $item = (object) ['id' => 5, 'name' => 'Item 5', 'price' => 50];
    $resultSingle = ProductResource::make($item);

    expect($resultSingle)->toBeArray();
    expect($resultSingle['id'])->toBe(5);
    expect($resultSingle['name'])->toBe('Item 5');

    $collectionObj = new Collection([$item]);
    $resultCollection = ProductResource::make($collectionObj);

    expect($resultCollection)->toBeArray();
    expect(count($resultCollection))->toBe(1);
    expect($resultCollection[0]['id'])->toBe(5);
});
