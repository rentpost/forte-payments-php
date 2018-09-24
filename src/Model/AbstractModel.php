<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\ValidatingSerializer\ValidatableSerializableInterface;

abstract class AbstractModel implements ValidatableSerializableInterface
{
    /**
     * @var Response|null
     */
    protected $response;


    /**
     * @return Response|null
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param Response $response
     */
    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }
}
