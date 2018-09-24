<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#responseobject
 */
class Response extends AbstractModel
{
    /**
     * @var string
     */
    protected $responseDesc;

    /**
     * @var string
     */
    protected $environment;

    /**
     * The code indicating whether or not the transaction was authorized.
     * This field is not used for voiding transactions
     *
     * @var string
     */
    protected $authorizationCode;

    /**
     * @var string
     */
    protected $responseType;

    /**
     * @var string
     */
    protected $responseCode;

    /**
     * @var string
     */
    protected $preauthResult;

    /**
     * @var string
     */
    protected $preauthDesc;

    /**
     * @var string
     */
    protected $preauthNegReport;

    /**
     * @var string
     */
    protected $avsResult;

    /**
     * @var string
     */
    protected $cvvResult;

    /**
     * @var Attribute\Money
     */
    protected $availableCardBalance;

    /**
     * @var Attribute\Money
     */
    protected $requestedAmount;


    /**
     * @return string|null
     */
    public function getResponseDesc(): ?string
    {
        return $this->responseDesc;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $responseDesc
     */
    public function setResponseDesc(?string $responseDesc): void
    {
        $this->responseDesc = $responseDesc;
    }


    /**
     * @return string|null
     */
    public function getEnvironment(): ?string
    {
        return $this->environment;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $environment
     */
    public function setEnvironment(?string $environment): void
    {
        $this->environment = $environment;
    }


    /**
     * @return string|null
     */
    public function getAuthorizationCode(): ?string
    {
        return $this->authorizationCode;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $authorizationCode
     */
    public function setAuthorizationCode(?string $authorizationCode): void
    {
        $this->authorizationCode = $authorizationCode;
    }


    /**
     * @return string|null
     */
    public function getResponseType(): ?string
    {
        return $this->responseType;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $responseType
     */
    public function setResponseType(?string $responseType): void
    {
        $this->responseType = $responseType;
    }


    /**
     * @return string|null
     */
    public function getResponseCode(): ?string
    {
        return $this->responseCode;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $responseCode
     */
    public function setResponseCode(?string $responseCode): void
    {
        $this->responseCode = $responseCode;
    }


    /**
     * @return string|null
     */
    public function getPreauthResult(): ?string
    {
        return $this->preauthResult;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $preauthResult
     */
    public function setPreauthResult(?string $preauthResult): void
    {
        $this->preauthResult = $preauthResult;
    }


    /**
     * @return string|null
     */
    public function getPreauthDesc(): ?string
    {
        return $this->preauthDesc;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $preauthDesc
     */
    public function setPreauthDesc(?string $preauthDesc): void
    {
        $this->preauthDesc = $preauthDesc;
    }


    /**
     * @return string|null
     */
    public function getPreauthNegReport(): ?string
    {
        return $this->preauthNegReport;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $preauthNegReport
     */
    public function setPreauthNegReport(?string $preauthNegReport): void
    {
        $this->preauthNegReport = $preauthNegReport;
    }


    /**
     * @return string|null
     */
    public function getAvsResult(): ?string
    {
        return $this->avsResult;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $avsResult
     */
    public function setAvsResult(?string $avsResult): void
    {
        $this->avsResult = $avsResult;
    }


    /**
     * @return string|null
     */
    public function getCvvResult(): ?string
    {
        return $this->cvvResult;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param string|null $cvvResult
     */
    public function setCvvResult(?string $cvvResult): void
    {
        $this->cvvResult = $cvvResult;
    }


    /**
     * @return Attribute\Money|null
     */
    public function getAvailableCardBalance(): ?Attribute\Money
    {
        return $this->availableCardBalance;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param Attribute\Money|null $availableCardBalance
     */
    public function setAvailableCardBalance(?Attribute\Money $availableCardBalance): void
    {
        $this->availableCardBalance = $availableCardBalance;
    }


    /**
     * @return Attribute\Money|null
     */
    public function getRequestedAmount(): ?Attribute\Money
    {
        return $this->requestedAmount;
    }


    /**
     * @internal here to keep deserializer happy
     *
     * @param Attribute\Money|null $requestedAmount
     */
    public function setRequestedAmount(?Attribute\Money $requestedAmount): void
    {
        $this->requestedAmount = $requestedAmount;
    }
}
