<?php

namespace App\Core;

class Event
{
    protected static array $listeners = [];
    protected static bool $faking = false;
    protected static array $dispatchedEvents = [];

    public static function listen(string|object $event, callable|string $listener): void
    {
        $eventKey = is_object($event) ? get_class($event) : (string)$event;
        static::$listeners[$eventKey][] = $listener;
    }

    public static function fake(): void
    {
        static::$faking = true;
        static::$dispatchedEvents = [];
    }

    public static function resetFakes(): void
    {
        static::$faking = false;
        static::$dispatchedEvents = [];
        static::$listeners = [];
    }

    public static function getDispatchedEvents(): array
    {
        return static::$dispatchedEvents;
    }

    public static function assertDispatched(string $eventClass, ?callable $callback = null): bool
    {
        foreach (static::$dispatchedEvents as $item) {
            $eventObj = $item['event'];
            if ($eventObj instanceof $eventClass || (is_string($eventObj) && $eventObj === $eventClass)) {
                if ($callback === null || $callback($eventObj, $item['payload'])) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function dispatch(object|string $event, mixed $payload = null): mixed
    {
        $eventKey = is_object($event) ? get_class($event) : (string)$event;

        static::$dispatchedEvents[] = [
            'event' => $event,
            'payload' => $payload,
            'dispatched_at' => date('Y-m-d H:i:s'),
        ];

        if (static::$faking) {
            return null;
        }

        $results = [];
        if (isset(static::$listeners[$eventKey])) {
            foreach (static::$listeners[$eventKey] as $listener) {
                if (is_callable($listener)) {
                    $results[] = $listener($event, $payload);
                } elseif (is_string($listener) && class_exists($listener)) {
                    $instance = new $listener();
                    if (method_exists($instance, 'handle')) {
                        $results[] = $instance->handle($event, $payload);
                    }
                }
            }
        }

        return $results;
    }
}
