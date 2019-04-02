<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

class UnknownException extends AbstractRequestException
{
    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        Model\AbstractModel $model
    )
    {
        $message = 'Forte Request: Unknown Problem';

        parent::__construct($response, $model, $message);
    }

}
