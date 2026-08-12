<?php

/*
|--------------------------------------------------------------------------
| Test Case Configuration
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific
| PHPUnit test case class. By default, that class is "PHPUnit\Framework\TestCase".
|
*/

uses(Tests\TestCase::class)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Custom Expectations & Helpers
|--------------------------------------------------------------------------
|
| Custom expectations allow you to extend Pest's assertion library.
|
*/

expect()->extend('toBeSuccessResponse', function () {
    return $this->toBeArray()
        ->toHaveKey('status', true);
});
