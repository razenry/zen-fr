<?php

namespace App\Core;

abstract class Notification
{
    /**
     * Get notification delivery channels.
     */
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Send notification to one or multiple notifiables.
     */
    public static function send(mixed $notifiables, Notification $notification): void
    {
        $targets = is_array($notifiables) ? $notifiables : [$notifiables];
        foreach ($targets as $target) {
            $channels = $notification->via($target);
            foreach ($channels as $channel) {
                if ($channel === 'mail' && method_exists($notification, 'toMail')) {
                    $mailData = $notification->toMail($target);
                    if ($mailData instanceof Mailable) {
                        Mail::to($target)->send($mailData);
                    }
                } elseif ($channel === 'database' && method_exists($notification, 'toDatabase')) {
                    $data = $notification->toDatabase($target);
                    // Store in notifications table if DB available
                    $db = new \Database\Database();
                    try {
                        $db->query("INSERT INTO `notifications` (`notifiable_id`, `data`, `created_at`) VALUES (:id, :data, NOW())");
                        $db->bind(':id', is_object($target) ? ($target->id ?? 1) : 1);
                        $db->bind(':data', json_encode($data));
                        $db->execute();
                    } catch (\Throwable $e) {}
                } elseif ($channel === 'webhook' && method_exists($notification, 'toWebhook')) {
                    $webhookData = $notification->toWebhook($target);
                    if (isset($webhookData['url'])) {
                        Http::post($webhookData['url'], $webhookData['data'] ?? []);
                    }
                }
            }
        }
    }
}
