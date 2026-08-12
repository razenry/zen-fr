<?php

use Database\Paginator;
use App\Core\Model;

class TestSampleModel extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
        'age' => 'integer',
        'options' => 'array'
    ];
}

test('model attribute casting converts boolean, integer and json array automatically', function () {
    $model = new TestSampleModel();
    $model->is_active = '1';
    $model->age = '25';
    $model->options = '{"theme":"dark","lang":"id"}';

    expect($model->is_active)->toBeTrue();
    expect($model->age)->toBe(25);
    expect($model->options)->toBeArray();
    expect($model->options['theme'])->toBe('dark');
});

test('paginator object generates bootstrap pagination links correctly', function () {
    $items = [['id' => 1, 'name' => 'Item 1'], ['id' => 2, 'name' => 'Item 2']];
    $paginator = new Paginator($items, 20, 2, 1, 'page');

    expect($paginator->count())->toBe(2);
    expect($paginator->lastPage)->toBe(10);
    expect($paginator->toArray())->toHaveKey('data');
    expect($paginator->links())->toContain('pagination');
    expect($paginator->links())->toContain('page=2');
});
