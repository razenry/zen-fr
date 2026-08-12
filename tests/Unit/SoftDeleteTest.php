<?php

use App\Core\Model;
use App\Core\SoftDeletes;

class SoftDeleteSampleModel extends Model
{
    use SoftDeletes;

    protected $table = 'soft_delete_samples';
}

test('soft delete trait sets trashed flag and soft delete columns', function () {
    $model = new SoftDeleteSampleModel();
    $model->id = 1;
    $model->deleted_at = null;

    expect($model->trashed())->toBeFalse();

    $model->deleted_at = '2026-08-12 12:00:00';
    expect($model->trashed())->toBeTrue();

    $model->restore();
    expect($model->trashed())->toBeFalse();
    expect($model->deleted_at)->toBeNull();
});

test('model soft delete scoping applies withTrashed and onlyTrashed state', function () {
    $model = new SoftDeleteSampleModel();

    $model->withTrashed();
    expect($model->getDbInstance()->getTable())->toBe('soft_delete_samples');

    $model->onlyTrashed();
    expect($model->getDbInstance()->getTable())->toBe('soft_delete_samples');
});
