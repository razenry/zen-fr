<?php

use App\Core\Gate;

test('gate abilities define, allows, and denies', function () {
    Gate::define('edit-post', function ($user, $post) {
        return isset($user['id']) && isset($post['user_id']) && $user['id'] === $post['user_id'];
    });

    $userOwner = ['id' => 1, 'name' => 'Razenry'];
    $userGuest = ['id' => 2, 'name' => 'Guest'];
    $post = ['id' => 10, 'user_id' => 1, 'title' => 'Zen PHP v4 Release'];

    expect(Gate::allows('edit-post', $userOwner, $post))->toBeTrue();
    expect(Gate::allows('edit-post', $userGuest, $post))->toBeFalse();
    expect(Gate::denies('edit-post', $userGuest, $post))->toBeTrue();
});
