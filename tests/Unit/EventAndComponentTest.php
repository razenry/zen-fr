<?php

use App\Core\Event;
use App\Core\ViewComponent;
use App\Core\Config;
use App\Core\Auth;
use App\Core\Gate;

class TestV7OrderEvent
{
    public function __construct(public int $orderId, public int $amount) {}
}

class TestV7SampleComponent extends ViewComponent
{
    public function render(): string
    {
        return '<div class="alert">' . htmlspecialchars($this->data['title'] ?? 'Alert') . '</div>';
    }
}

test('event dispatching listening and test faking assertions', function () {
    Event::fake();

    $event = new TestV7OrderEvent(101, 250000);
    Event::dispatch($event);

    expect(Event::assertDispatched(TestV7OrderEvent::class))->toBeTrue();
    expect(Event::assertDispatched(TestV7OrderEvent::class, function ($e) {
        return $e->orderId === 101 && $e->amount === 250000;
    }))->toBeTrue();

    Event::resetFakes();
});

test('event listener execution when dispatching', function () {
    $handled = false;

    Event::listen(TestV7OrderEvent::class, function ($e) use (&$handled) {
        $handled = true;
    });

    Event::dispatch(new TestV7OrderEvent(102, 50000));

    expect($handled)->toBeTrue();
    Event::resetFakes();
});

test('view component directive evaluation for auth and can', function () {
    Auth::login(1, 'John Doe');

    Gate::define('edit-settings', fn($u) => true);
    Gate::define('delete-db', fn($u) => false);

    $template = "@auth Welcome User @endauth @guest Guest User @endguest @can('edit-settings') SettingsAllowed @endcan @cannot('delete-db') DeleteForbidden @endcannot";
    $output = ViewComponent::evaluateDirectives($template);

    expect($output)->toContain('Welcome User');
    expect($output)->not->toContain('Guest User');
    expect($output)->toContain('SettingsAllowed');
    expect($output)->toContain('DeleteForbidden');

    Auth::logout();
});

test('config caching and clearing engine', function () {
    Config::set('custom_key', 'test_value');
    expect(Config::cache())->toBeTrue();
    expect(Config::isCached())->toBeTrue();

    expect(Config::clearCache())->toBeTrue();
    expect(Config::isCached())->toBeFalse();
});
