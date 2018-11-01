<?php

namespace Rentpost\ForteApi\Void;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{

    public function emergency($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function alert($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function critical($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function error($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function warning($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function notice($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function info($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function debug($message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }


    public function log($level, $message, array $context = array())
    {
        /* intentionally do nothing, this is the Void logger */
    }

}
