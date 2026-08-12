<?php

namespace App\Core {

    class Lang
    {
        protected static $translations = [];
        protected static $currentLocale = 'id';

        public static function init()
        {
            if (isset($_SESSION['lang']) && in_array($_SESSION['lang'], ['id', 'en', 'ja'])) {
                self::$currentLocale = $_SESSION['lang'];
            }

            $file = dirname(dirname(__DIR__)) . '/resources/lang/' . self::$currentLocale . '.php';
            if (file_exists($file)) {
                self::$translations = require $file;
            }
        }

        public static function setLocale(string $locale)
        {
            if (in_array($locale, ['id', 'en', 'ja'])) {
                $_SESSION['lang'] = $locale;
                self::$currentLocale = $locale;
                self::init();
            }
        }

        public static function getLocale(): string
        {
            return self::$currentLocale;
        }

        public static function get(string $key, string $default = ''): string
        {
            if (empty(self::$translations)) {
                self::init();
            }

            return self::$translations[$key] ?? ($default !== '' ? $default : $key);
        }
    }

}

namespace {

    if (!function_exists('lang')) {
        function lang(string $key, string $default = ''): string
        {
            return \App\Core\Lang::get($key, $default);
        }
    }

}
