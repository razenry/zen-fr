<?php

namespace Database;

use Database\Database;

abstract class Seeder
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Run the database seeds.
     */
    abstract public function run();

    /**
     * Call another seeder class.
     */
    public function call($class)
    {
        if (class_exists($class)) {
            $seeder = new $class();
            $seeder->run();
        }
    }
}
