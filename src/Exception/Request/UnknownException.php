<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

/**
 * UnknownException
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class UnknownException extends AbstractRequestException
{

    /**
     * Constructor
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param Model\AbstractModel|null $model
     */
    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        ?Model\AbstractModel $model
    ) {
        $message = 'Forte Request: Unknown Problem';

        parent::__construct($response, $model, $message);
    }
}
