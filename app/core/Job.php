<?php

namespace App\Core;

abstract class Job
{
    /**
     * Execute the job logic.
     */
    abstract public function handle(): void;

    /**
     * Dispatch the job onto the queue.
     */
    public static function dispatch(...$arguments): void
    {
        $reflection = new \ReflectionClass(static::class);
        $job = $reflection->newInstanceArgs($arguments);
        Queue::push($job);
    }
}
