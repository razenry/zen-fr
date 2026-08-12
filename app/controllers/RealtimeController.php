<?php

namespace App\Controllers;

use App\Core\Controller;

class RealtimeController extends Controller
{
    public function stream()
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no');

        // Send initial connection event
        $data = [
            'time' => date('H:i:s'),
            'message' => 'Connected to Zen Realtime Stream'
        ];

        echo "event: connected\n";
        echo 'data: ' . json_encode($data) . "\n\n";

        if (ob_get_level() > 0) ob_flush();
        flush();

        // Send a ping / update stream
        $data = [
            'time' => date('H:i:s'),
            'timestamp' => time(),
            'server_status' => 'online'
        ];

        echo "event: ping\n";
        echo 'data: ' . json_encode($data) . "\n\n";

        if (ob_get_level() > 0) ob_flush();
        flush();
        exit;
    }
}
