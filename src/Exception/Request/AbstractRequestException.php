<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Exception\AbstractException;
use Rentpost\ForteApi\Model\AbstractModel;

abstract class AbstractRequestException extends AbstractException
{

    protected $response;

    protected $model;

    
    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        AbstractModel $model,
        $message
    )
    {
        parent::__construct($message);

        $this->response = $response;
        $this->model = $model;
    }


    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        $this->response;
    }


    public function getModel(): AbstractModel
    {
        return $this->model;
    }
}
