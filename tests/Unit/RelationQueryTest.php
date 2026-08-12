<?php

use App\Core\Model;
use App\Core\Relations\HasMany;
use App\Core\Relations\BelongsTo;
use App\Core\Relations\HasOne;

class DummyPostModel extends Model
{
    protected $table = 'dummy_posts';

    public function author()
    {
        return $this->belongsTo(DummyUserModel::class, 'user_id', 'id');
    }
}

class DummyUserModel extends Model
{
    protected $table = 'dummy_users';

    public function posts()
    {
        return $this->hasMany(DummyPostModel::class, 'user_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(DummyProfileModel::class, 'user_id', 'id');
    }
}

class DummyProfileModel extends Model
{
    protected $table = 'dummy_profiles';
}

test('model relationship methods return Relation instances for query chaining', function () {
    $user = new DummyUserModel();
    $user->id = 5;

    $relation = $user->posts();

    expect($relation)->toBeInstanceOf(HasMany::class);
    expect($relation->getForeignKey())->toBe('user_id');
    expect($relation->getLocalKey())->toBe('id');

    $chainedRelation = $user->posts()->where('status', 'published');
    expect($chainedRelation)->toBeInstanceOf(HasMany::class);
});

test('model relationship query methods like with, whereHas and doesntHave construct query builders', function () {
    $modelWith = DummyUserModel::with('posts');
    expect($modelWith)->toBeInstanceOf(DummyUserModel::class);

    $modelWhereHas = DummyUserModel::whereHas('posts', function($q) {
        $q->where('status', 'active');
    });
    expect($modelWhereHas)->toBeInstanceOf(DummyUserModel::class);

    $modelDoesntHave = DummyUserModel::doesntHave('posts');
    expect($modelDoesntHave)->toBeInstanceOf(DummyUserModel::class);
});
