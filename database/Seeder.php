<?php

namespace Database;

abstract class Seeder
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Run the database seeds.
     */
    abstract public function run();

    /**
     * Call another seeder class or array of seeders.
     */
    public function call(array|string $classes): void
    {
        $classes = is_array($classes) ? $classes : [$classes];
        foreach ($classes as $class) {
            if (class_exists($class)) {
                $seeder = new $class();
                $seeder->run();
            }
        }
    }
}
