<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

/**
 * Exception for Forte transactions that are actual payment issues, these are all U** response code
 * transactions, like a "U10 Duplicate Transaction" response code.
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class TransactionException extends AbstractRequestException
{

    /**
     * Constructor
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param Model\AbstractModel $model
     */
    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        Model\AbstractModel $model
    ) {
        $this->model = $model;

        $message = '';
        if ($model->getResponse()) {
            $message .= $model->getResponse()->getResponseDesc();
        }

        $message .= ' (Forte ' . $response->getStatusCode() . ' HTTP Response)';

        parent::__construct($response, $model, $message);
    }
}
