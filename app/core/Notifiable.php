<?php

namespace App\Core;

trait Notifiable
{
    /**
     * Send given notification to the entity.
     */
    public function notify(Notification $notification): void
    {
        Notification::send($this, $notification);
    }
}
