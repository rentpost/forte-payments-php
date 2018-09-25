<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

class TransactionException extends AbstractRequestException
{

    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        Model\AbstractModel $model
    ) {
        $message = 'Forte Transaction Problem (' . $response->getStatusCode() . ' HTTP Response)';
        
        if ($model->getResponse()) {
            $message .= ': ';
            $message .= $model->getResponse()->getResponseCode();
            $message .= ' ';
            $message .= $model->getResponse()->getResponseDesc();
        }
        
        parent::__construct($response, $model, $message);
    }
}
