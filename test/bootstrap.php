<?php

use Symfony\Component\VarDumper\VarDumper;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/settings.php';

date_default_timezone_set('UTC');

if (!function_exists('dump')) {
    function dump(...$vars)
    {
        $backtrace = debug_backtrace();

        $file = $backtrace[0]['file'];
        $line = $backtrace[0]['line'];

        printf('dump() called from `%s:%s`', $file, $line);
        print PHP_EOL;

        foreach ($vars as $var) {
            VarDumper::dump($var);
            print PHP_EOL;
        }
        print PHP_EOL;
        print PHP_EOL;
    }
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        $backtrace = debug_backtrace();

        $file = $backtrace[0]['file'];
        $line = $backtrace[0]['line'];

        printf('dd() called from `%s:%s`', $file, $line);
        print PHP_EOL;

        foreach ($vars as $var) {
            VarDumper::dump($var);
            print PHP_EOL;
        }

        print PHP_EOL;
        print PHP_EOL;
        exit();
    }
}
