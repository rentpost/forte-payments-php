<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

/**
 * Exception for Forte transactions
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class TransactionException extends AbstractRequestException
{

    /** @var Model\AbstractModel */
    protected $model;


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

        $message = 'Forte Transaction Problem (' . $response->getStatusCode() . ' HTTP Response)';

        if ($model->getResponse()) {
            $message .= ': ';
            $message .= $model->getResponse()->getResponseCode();
            $message .= ' ';
            $message .= $model->getResponse()->getResponseDesc();
        }

        parent::__construct($response, $model, $message);
    }


    /**
     * Get's the associated Model
     */
    public function getModel(): Model\AbstractModel
    {
        return $this->model;
    }
}
