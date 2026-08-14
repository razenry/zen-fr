<?php

namespace App\Core;

class ScheduledTask
{
    public mixed $action;
    public string $type; // 'command', 'job', 'closure'
    public string $expression = '* * * * *'; // minute hour day month dayofweek

    public function __construct(mixed $action, string $type = 'closure')
    {
        $this->action = $action;
        $this->type = $type;
    }

    public function everyMinute(): static
    {
        $this->expression = '* * * * *';
        return $this;
    }

    public function hourly(): static
    {
        $this->expression = '0 * * * *';
        return $this;
    }

    public function daily(): static
    {
        $this->expression = '0 0 * * *';
        return $this;
    }

    public function weekly(): static
    {
        $this->expression = '0 0 * * 0';
        return $this;
    }

    public function run(): mixed
    {
        if ($this->type === 'closure' && is_callable($this->action)) {
            return call_user_func($this->action);
        }

        if ($this->type === 'job' && is_object($this->action)) {
            Queue::push($this->action);
            return true;
        }

        if ($this->type === 'command' && is_string($this->action)) {
            return exec($this->action);
        }

        return false;
    }
}

class Scheduler
{
    protected static array $tasks = [];

    public static function call(callable $callback): ScheduledTask
    {
        $task = new ScheduledTask($callback, 'closure');
        static::$tasks[] = $task;
        return $task;
    }

    public static function job(object $job): ScheduledTask
    {
        $task = new ScheduledTask($job, 'job');
        static::$tasks[] = $task;
        return $task;
    }

    public static function command(string $command): ScheduledTask
    {
        $task = new ScheduledTask($command, 'command');
        static::$tasks[] = $task;
        return $task;
    }

    public static function getTasks(): array
    {
        return static::$tasks;
    }

    public static function runDueTasks(): int
    {
        $executed = 0;
        foreach (static::$tasks as $task) {
            $task->run();
            $executed++;
        }
        return $executed;
    }
}
