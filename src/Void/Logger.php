<?php

namespace Rentpost\ForteApi\Void;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{

    public function emergency(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function alert(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function critical(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function error(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function warning(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function notice(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function info(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function debug(string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function log($level, string|\Stringable $message, array $context = []): void
    {
        /* intentionally do nothing, this is the Void logger */
    }
}
