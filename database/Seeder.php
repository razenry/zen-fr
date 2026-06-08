<?php

namespace Database;

abstract class Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    abstract public function run();

    /**
     * Call another seeder.
     *
     * @param string $class
     * @return void
     */
    public function call($class)
    {
        $fullClass = "\\Database\\Seeders\\" . $class;
        // In case not auto-loaded by composer, try to include it
        $file = __DIR__ . "/seeders/{$class}.php";
        if (file_exists($file)) {
            require_once $file;
        }

        if (class_exists($fullClass)) {
            echo "Seeding: {$class}\n";
            $seeder = new $fullClass();
            $seeder->run();
            echo "Seeded:  {$class}\n";
        } else {
            echo "Error: Seeder class '{$fullClass}' not found.\n";
        }
    }
}
