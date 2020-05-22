<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\ValidatingSerializer\ValidatableSerializableInterface;

/**
 * Abstract Model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
abstract class AbstractModel implements ValidatableSerializableInterface
{

    protected ?Response $response = null;


    /**
     * Gets the response
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
    public function setResponse(Response $response): self
    {
        $this->response = $response;

        return $this;
    }
}
