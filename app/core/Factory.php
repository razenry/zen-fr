<?php

namespace App\Core;

abstract class Factory
{
    protected string $model;
    protected int $count = 1;

    abstract public function definition(): array;

    public function count(int $count): static
    {
        $clone = clone $this;
        $clone->count = $count;
        return $clone;
    }

    /**
     * Make instances without saving to database.
     */
    public function make(array $attributes = []): mixed
    {
        $results = [];
        for ($i = 0; $i < $this->count; $i++) {
            $data = array_merge($this->definition(), $attributes);
            $modelClass = $this->model;
            $results[] = new $modelClass($data);
        }

        return $this->count === 1 ? $results[0] : new Collection($results);
    }

    /**
     * Create instances and save to database.
     */
    public function create(array $attributes = []): mixed
    {
        $results = [];
        for ($i = 0; $i < $this->count; $i++) {
            $data = array_merge($this->definition(), $attributes);
            $modelClass = $this->model;
            if (method_exists($modelClass, 'create')) {
                $results[] = $modelClass::create($data);
            } else {
                $results[] = new $modelClass($data);
            }
        }

        return $this->count === 1 ? $results[0] : new Collection($results);
    }

    // --- Built-in Fake Generators ---

    public function fakeName(): string
    {
        $firsts = ['Alex', 'Jordan', 'Taylor', 'Morgan', 'Sam', 'Chris', 'Pat', 'Casey'];
        $lasts = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Miller', 'Davis'];
        return $firsts[array_rand($firsts)] . ' ' . $lasts[array_rand($lasts)];
    }

    public function fakeEmail(): string
    {
        $user = strtolower(str_replace(' ', '.', $this->fakeName())) . rand(100, 999);
        $domains = ['example.com', 'test.org', 'demo.net'];
        return $user . '@' . $domains[array_rand($domains)];
    }

    public function fakeText(int $words = 6): string
    {
        $pool = ['lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'zen', 'framework', 'reactive', 'fast', 'clean'];
        shuffle($pool);
        return ucfirst(implode(' ', array_slice($pool, 0, min($words, count($pool)))));
    }

    public function fakeNumber(int $min = 1, int $max = 1000): int
    {
        return rand($min, $max);
    }

    public function fakeDate(): string
    {
        return date('Y-m-d H:i:s', time() - rand(0, 30 * 86400));
    }
}
