<?php

namespace App\Core;

class MailPending
{
    protected array $recipients = [];

    public function __construct(array $recipients)
    {
        $this->recipients = $recipients;
    }

    public function send(Mailable $mailable): bool
    {
        return Mail::sendMailable($this->recipients, $mailable);
    }
}

class Mail
{
    protected static bool $faking = false;
    protected static array $sentMails = [];

    public static function to(mixed $users): MailPending
    {
        $recipients = [];
        if (is_array($users)) {
            foreach ($users as $u) {
                $recipients[] = is_object($u) ? ($u->email ?? '') : (string)$u;
            }
        } elseif (is_object($users)) {
            $recipients[] = $users->email ?? '';
        } else {
            $recipients[] = (string)$users;
        }

        return new MailPending(array_filter($recipients));
    }

    public static function fake(): void
    {
        static::$faking = true;
        static::$sentMails = [];
    }

    public static function resetFakes(): void
    {
        static::$faking = false;
        static::$sentMails = [];
    }

    public static function getSentMails(): array
    {
        return static::$sentMails;
    }

    public static function assertSent(string $mailableClass, ?callable $callback = null): bool
    {
        foreach (static::$sentMails as $mailData) {
            if ($mailData['mailable'] instanceof $mailableClass) {
                if ($callback === null || $callback($mailData['mailable'], $mailData['recipients'])) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function sendMailable(array $recipients, Mailable $mailable): bool
    {
        $content = $mailable->render();
        $subject = $mailable->subject ?: 'Zen PHP Mail';

        static::$sentMails[] = [
            'recipients' => $recipients,
            'subject' => $subject,
            'content' => $content,
            'mailable' => $mailable,
        ];

        if (static::$faking) {
            return true;
        }

        // Standard PHP mail() driver fallback
        $to = implode(', ', $recipients);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@zenphp.local>' . "\r\n";

        return @mail($to, $subject, $content, $headers);
    }
}
