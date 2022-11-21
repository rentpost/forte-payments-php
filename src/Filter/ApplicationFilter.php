<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Filter;

use Rentpost\ForteApi\Attribute;


class ApplicationFilter extends AbstractFilter
{
    /**
     * @var Attribute\Date
     */
    protected $startReceivedDate;

    /**
     * @var Attribute\Date
     */
    protected $endReceivedDate;

    /**
     * @var Attribute\Date
     */
    protected $startUpdatedDate;

    /**
     * @var Attribute\Date
     */
    protected $endUpdatedDate;

    /**
     * @var string
     */
    protected $status;


    /**
     * @return Attribute\Date
     */
    public function getStartReceivedDate(): Attribute\Date
    {
        return $this->startReceivedDate;
    }


    /**
     * @param Attribute\Date $startReceivedDate
     *
     * @return self
     */
    public function setStartReceivedDate(Attribute\Date $startReceivedDate): self
    {
        $this->startReceivedDate = $startReceivedDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndReceivedDate(): Attribute\Date
    {
        return $this->endReceivedDate;
    }


    /**
     * @param Attribute\Date $endReceivedDate
     *
     * @return self
     */
    public function setEndReceivedDate(Attribute\Date $endReceivedDate): self
    {
        $this->endReceivedDate = $endReceivedDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getStartUpdatedDate(): Attribute\Date
    {
        return $this->startUpdatedDate;
    }


    /**
     * @param Attribute\Date $startUpdatedDate
     *
     * @return self
     */
    public function setStartUpdatedDate(Attribute\Date $startUpdatedDate): self
    {
        $this->startUpdatedDate = $startUpdatedDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndUpdatedDate(): Attribute\Date
    {
        return $this->endUpdatedDate;
    }


    /**
     * @param Attribute\Date $endUpdatedDate
     *
     * @return self
     */
    public function setEndUpdatedDate(Attribute\Date $endUpdatedDate): self
    {
        $this->endUpdatedDate = $endUpdatedDate;

        return $this;
    }


    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }


    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
