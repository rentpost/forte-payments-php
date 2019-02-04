<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Exception\AbstractException;


/**
 * If a request times out
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class TimeoutException extends AbstractException
{

    /**
     * Constructor
     *
     * @param string $error
     * @param \Throwable $previousException
     */
    public function __construct(string $error, ?\Throwable $previousException)
    {
        $message = "Request timed out with: {$error}";
        $code = $previousException->getCode() ?: 0;

        parent::__construct($message, $code, $previousException);
    }
}
