<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\File\Logger;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;
use Rentpost\ForteApi\Miscellaneous\Inflector;
use Rentpost\ForteApi\Void\Logger as VoidLogger;

/**
 * Logger Factory
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Factory
{

    /** @var string */
    protected $loggerBasePath;


    /**
     * Constructor
     *
     * @param string|null $loggerBasePath
     */
    public function __construct(?string $loggerBasePath)
    {
        $this->loggerBasePath = $loggerBasePath;
    }


    /**
     * Creates a file logger instance
     *
     * @param string $name
     */
    public function make(string $name): LoggerInterface
    {
        if (! $this->loggerBasePath) {
            return new VoidLogger();
        }

        // WONTFIX will not be able to use `Inflector` like this when this sprocket is moved out of the main repo
        $path = $this->loggerBasePath . '/' . Inflector::sanitizeFileName($name) . '.log';

        // WONTFIX maybe we should allow this to be confgured via an argument?
        // $lineFormatter = new LineFormatter("[%datetime%] %channel%.%level_name%: %message% %extra% %context%\n");
        $lineFormatter = new LineFormatter("%message%\n");

        $handler = new StreamHandler($path);
        $handler->setFormatter($lineFormatter);

        // Create a log channel
        $log = new \Monolog\Logger($name);
        $log->pushHandler($handler);

        return $log;
    }
}
