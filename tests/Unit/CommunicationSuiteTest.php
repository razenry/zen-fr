<?php

use App\Core\Http;
use App\Core\HttpResponse;
use App\Core\Mail;
use App\Core\Mailable;
use App\Core\Notification;
use App\Core\Notifiable;

class SampleV6User
{
    use Notifiable;
    public int $id = 1;
    public string $email = 'user@example.com';
}

class TestWelcomeMail extends Mailable
{
    public function build(): static
    {
        if (empty($this->subject)) {
            $this->subject('Welcome to Zen PHP');
        }
        return $this->html('<h1>Welcome User!</h1>');
    }
}

class TestOrderNotification extends Notification
{
    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): Mailable
    {
        $mail = new TestWelcomeMail();
        $mail->subject('Order Processed');
        return $mail;
    }
}

test('http client faking requests and response status inspection', function () {
    Http::fake([
        'api.github.com/*' => new HttpResponse(200, json_encode(['user' => 'razenry', 'status' => 'active'])),
        '*' => new HttpResponse(404, json_encode(['error' => 'Not Found'])),
    ]);

    $response = Http::withToken('test-token')->get('https://api.github.com/users/razenry');

    expect($response->successful())->toBeTrue();
    expect($response->status())->toBe(200);
    expect($response->json('user'))->toBe('razenry');

    $failedResponse = Http::get('https://unknown-domain.com');
    expect($failedResponse->failed())->toBeTrue();

    Http::resetFakes();
});

test('mailable rendering and mail fake assertions', function () {
    Mail::fake();

    $user = new SampleV6User();
    $mailable = new TestWelcomeMail();

    Mail::to($user)->send($mailable);

    expect(Mail::assertSent(TestWelcomeMail::class))->toBeTrue();
    expect(count(Mail::getSentMails()))->toBe(1);

    Mail::resetFakes();
});

test('notification dispatching via notifiable trait', function () {
    Mail::fake();

    $user = new SampleV6User();
    $user->notify(new TestOrderNotification());

    expect(Mail::assertSent(TestWelcomeMail::class, function ($mail) {
        return $mail->subject === 'Order Processed';
    }))->toBeTrue();

    Mail::resetFakes();
});
