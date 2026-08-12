<?php

namespace App\Pulse;

use App\Core\ZenPulseComponent;
use App\Core\App;

class Counter extends ZenPulseComponent
{
    public $count = 0;
    public $name = 'Zen Developer';

    public function increment($amount = 1)
    {
        $this->count += (int) $amount;
    }

    public function decrement($amount = 1)
    {
        $this->count -= (int) $amount;
    }

    public function resetCount()
    {
        $this->count = 0;
    }

    public function render()
    {
        ob_start();
        App::View('pulse/counter', [
            'count' => $this->count,
            'name'  => $this->name
        ]);
        return ob_get_clean();
    }
}
