<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        if (!function_exists('request')) {
            require_once dirname(__DIR__) . '/app/init.php';
        }
        
        // Define base environment constants if needed
        if (!defined('DB_HOST')) {
            define('DB_HOST', 'localhost');
            define('DB_USER', 'root');
            define('DB_PASS', '');
            define('DB_NAME', 'zen_test');
        }
    }
}
