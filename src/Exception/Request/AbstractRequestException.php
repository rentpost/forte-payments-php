<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Psr\Http\Message\ResponseInterface;
use Rentpost\ForteApi\Exception\AbstractException;
use Rentpost\ForteApi\Model\AbstractModel;

/**
 * An abstract exception class for exceptions thrown due to request issues
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
abstract class AbstractRequestException extends AbstractException
{

    /** @var ResponseInterface */
    protected $response;

    /** @var AbstractModel */
    protected $model;


    /**
     * Constructor
     *
     * @param ResponseInterface $response
     * @param AbstractModel $model
     * @param string $message
     */
    public function __construct(
        ResponseInterface $response,
        AbstractModel $model,
        string $message
    ) {
        parent::__construct($message);

        $this->response = $response;
        $this->model = $model;
    }


    /**
     * Get the actual response object
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }


    /**
     * Gets the associated Model
     */
    public function getModel(): AbstractModel
    {
        return $this->model;
    }
}
