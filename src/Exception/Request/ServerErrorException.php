<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

/**
 * Forte returns 5xx HTTP status code
 */
class ServerErrorException extends AbstractRequestException
{
    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        Model\AbstractModel $model
    )
    {
        $message = 'Forte Server Error: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase();

        parent::__construct($response, $model, $message);
    }
}
