<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\Money;

/**
 * Misc response object
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Response extends AbstractModel
{

    protected ?string $responseDesc;
    protected ?string $environment;

    /**
     * The code indicating whether or not the transaction was authorized.
     * This field is not used for voiding transactions
     */
    protected ?string $authorizationCode;

    protected ?string $responseType;
    protected ?string $responseCode;
    protected ?string $preauthResult;
    protected ?string $preauthDesc;
    protected ?string $preauthNegReport;
    protected ?string $avsResult;
    protected ?string $cvvResult;
    protected ?Money $availableCardBalance;
    protected ?Money $requestedAmount;


    public function getResponseDesc(): ?string
    {
        return $this->responseDesc;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setResponseDesc(?string $responseDesc): void
    {
        $this->responseDesc = $responseDesc;
    }


    public function getEnvironment(): ?string
    {
        return $this->environment;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setEnvironment(?string $environment): void
    {
        $this->environment = $environment;
    }


    public function getAuthorizationCode(): ?string
    {
        return $this->authorizationCode;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setAuthorizationCode(?string $authorizationCode): void
    {
        $this->authorizationCode = $authorizationCode;
    }


    public function getResponseType(): ?string
    {
        return $this->responseType;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setResponseType(?string $responseType): void
    {
        $this->responseType = $responseType;
    }


    public function getResponseCode(): ?string
    {
        return $this->responseCode;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setResponseCode(?string $responseCode): void
    {
        $this->responseCode = $responseCode;
    }


    public function getPreauthResult(): ?string
    {
        return $this->preauthResult;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setPreauthResult(?string $preauthResult): void
    {
        $this->preauthResult = $preauthResult;
    }


    public function getPreauthDesc(): ?string
    {
        return $this->preauthDesc;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setPreauthDesc(?string $preauthDesc): void
    {
        $this->preauthDesc = $preauthDesc;
    }


    public function getPreauthNegReport(): ?string
    {
        return $this->preauthNegReport;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setPreauthNegReport(?string $preauthNegReport): void
    {
        $this->preauthNegReport = $preauthNegReport;
    }


    public function getAvsResult(): ?string
    {
        return $this->avsResult;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setAvsResult(?string $avsResult): void
    {
        $this->avsResult = $avsResult;
    }


    public function getCvvResult(): ?string
    {
        return $this->cvvResult;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setCvvResult(?string $cvvResult): void
    {
        $this->cvvResult = $cvvResult;
    }


    public function getAvailableCardBalance(): ?Money
    {
        return $this->availableCardBalance;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setAvailableCardBalance(?Money $availableCardBalance): void
    {
        $this->availableCardBalance = $availableCardBalance;
    }


    public function getRequestedAmount(): ?Money
    {
        return $this->requestedAmount;
    }


    /**
     * @internal here to keep deserializer happy
     */
    public function setRequestedAmount(?Money $requestedAmount): void
    {
        $this->requestedAmount = $requestedAmount;
    }
}
