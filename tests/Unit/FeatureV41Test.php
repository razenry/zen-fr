<?php

use App\Core\ApiResource;
use App\Core\Auth;
use App\Core\Collection;
use App\Core\Gate;
use App\Core\HasApiTokens;
use App\Core\HasAuthorization;

class TestUser
{
    use HasApiTokens, HasAuthorization;
    public $id = 1;
    public $name = 'John Doe';
}

class TestPostPolicy
{
    public function update($user, $post): bool
    {
        return $user && ($user->id === ($post->user_id ?? null));
    }
}

class UserResource extends ApiResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->when(isset($this->resource->email), $this->resource->email ?? null),
            'secret' => $this->when(false, 'hidden-secret'),
        ];
    }
}

test('api resource conditional attributes and paginated metadata', function () {
    $user = (object) ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'];
    $resource = UserResource::make($user);

    expect($resource['id'])->toBe(1);
    expect($resource['email'])->toBe('alice@example.com');
    expect(array_key_exists('secret', $resource))->toBe(true);
    expect($resource['secret'])->toBeNull();

    $paginated = UserResource::paginated([
        'data' => [$user],
        'current_page' => 1,
        'per_page' => 10,
        'total' => 1
    ]);

    expect($paginated)->toHaveKeys(['data', 'links', 'meta']);
    expect($paginated['meta']['current_page'])->toBe(1);
});

test('collection fluent methods groupby sortby chunk unique firstwhere', function () {
    $data = Collection::make([
        ['id' => 1, 'category' => 'tech', 'price' => 100],
        ['id' => 2, 'category' => 'tech', 'price' => 200],
        ['id' => 3, 'category' => 'life', 'price' => 150],
        ['id' => 4, 'category' => 'life', 'price' => 150],
    ]);

    $grouped = $data->groupBy('category');
    expect($grouped->count())->toBe(2);

    $sorted = $data->sortByDesc('price');
    expect($sorted->first()['id'])->toBe(2);

    $unique = $data->unique('price');
    expect($unique->count())->toBe(3);

    $chunked = $data->chunk(2);
    expect($chunked->count())->toBe(2);

    $item = $data->firstWhere('id', 3);
    expect($item['category'])->toBe('life');
});

test('auth multi guard and has api tokens trait', function () {
    $user = new TestUser();
    $token = $user->createToken('test-token', ['read', 'write']);

    expect($token)->toBeString();
    expect($user->tokenCan('read'))->toBeTrue();
    expect($user->tokenCan('delete'))->toBeFalse();

    Auth::setUser($user, 'api');
    expect(Auth::guard('api')->check('api'))->toBeTrue();
});

test('gate policy and has authorization trait', function () {
    $user = new TestUser();
    $post = (object) ['id' => 10, 'user_id' => 1];

    Gate::policy(stdClass::class, TestPostPolicy::class);

    expect($user->can('update', $post))->toBeTrue();

    $otherUser = new TestUser();
    $otherUser->id = 99;
    expect($otherUser->cannot('update', $post))->toBeTrue();
});
