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
     */
    public function __construct(string $error)
    {
        $message = "Request timed out with: {$error}";

        parent::__construct($message);
    }
}
