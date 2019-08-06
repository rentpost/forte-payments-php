<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EcheckSetting model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class EcheckSetting extends AbstractModel
{

    /**
     * @var int|null
     */
    protected $serviceFeePercentage;

    /**
     * @var int|null
     */
    protected $serviceFeeMinAmount;

    /**
     * @var int|null
     */
    protected $serviceFeeAmount;

    /**
     * @var array|null
     */
    protected $serviceFeeRange;

    /**
     * @var array|null
     */
    protected $serviceFeeTiered;

    /**
     * @var int|null
     */
    protected $serviceFeeAdditionalAmount;

    /**
     * @var int|null
     */
    protected $holdDaysSales;

    /**
     * @var int|null
     */
    protected $holdDaysRefunds;

    /**
     * @var Attribute\DateTime|null
     */
    protected $cutOffTime;

    /**
     * @var array|null
     */
    protected $entryClassCode;

    /**
     * @var string|null
     */
    protected $nachaId;

    /**
     * @var float|null
     */
    protected $dailyDebit;

    /**
     * @var float|null
     */
    protected $dailyCredit;

    /**
     * @var float|null
     */
    protected $monthlyDebit;

    /**
     * @var float|null
     */
    protected $monthlyCredit;

    /**
     * @var float|null
     */
    protected $perTransDebit;

    /**
     * @var float|null
     */
    protected $perTransCredit;


    /**
     * Get the value of serviceFeePercentage
     */
    public function getServiceFeePercentage(): ?int
    {
        return $this->serviceFeePercentage;
    }


    /**
     * Set the value of serviceFeePercentage
     *
     * @param int|null $serviceFeePercentage
     */
    public function setServiceFeePercentage(?int $serviceFeePercentage): self
    {
        $this->serviceFeePercentage = $serviceFeePercentage;

        return $this;
    }


    /**
     * Get the value of serviceFeeMinAmount
     */
    public function getServiceFeeMinAmount(): ?int
    {
        return $this->serviceFeeMinAmount;
    }


    /**
     * Set the value of serviceFeeMinAmount
     *
     * @param int|null $serviceFeeMinAmount
     */
    public function setServiceFeeMinAmount(?int $serviceFeeMinAmount): self
    {
        $this->serviceFeeMinAmount = $serviceFeeMinAmount;

        return $this;
    }


    /**
     * Get the value of serviceFeeAmount
     */
    public function getServiceFeeAmount(): ?int
    {
        return $this->serviceFeeAmount;
    }


    /**
     * Set the value of serviceFeeAmount
     *
     * @param int|null $serviceFeeAmount
     */
    public function setServiceFeeAmount(?int $serviceFeeAmount): self
    {
        $this->serviceFeeAmount = $serviceFeeAmount;

        return $this;
    }


    /**
     * Get the value of serviceFeeRange
     */
    public function getServiceFeeRange(): ?array
    {
        return $this->serviceFeeRange;
    }


    /**
     * Set the value of serviceFeeRange
     *
     * @param array|null $serviceFeeRange
     */
    public function setServiceFeeRange(?array $serviceFeeRange): self
    {
        $this->serviceFeeRange = $serviceFeeRange;

        return $this;
    }


    /**
     * Get the value of serviceFeeTiered
     */
    public function getServiceFeeTiered(): ?array
    {
        return $this->serviceFeeTiered;
    }


    /**
     * Set the value of serviceFeeTiered
     *
     * @param array|null $serviceFeeTiered
     */
    public function setServiceFeeTiered(?array $serviceFeeTiered): self
    {
        $this->serviceFeeTiered = $serviceFeeTiered;

        return $this;
    }


    /**
     * Get the value of serviceFeeAdditionalAmount
     */
    public function getServiceFeeAdditionalAmount(): ?int
    {
        return $this->serviceFeeAdditionalAmount;
    }


    /**
     * Set the value of serviceFeeAdditionalAmount
     *
     * @param int|null $serviceFeeAdditionalAmount
     */
    public function setServiceFeeAdditionalAmount(?int $serviceFeeAdditionalAmount): self
    {
        $this->serviceFeeAdditionalAmount = $serviceFeeAdditionalAmount;

        return $this;
    }


    /**
     * Get the value of holdDaysSales
     */
    public function getHoldDaysSales(): ?int
    {
        return $this->holdDaysSales;
    }


    /**
     * Set the value of holdDaysSales
     *
     * @param int|null $holdDaysSales
     */
    public function setHoldDaysSales(?int $holdDaysSales): self
    {
        $this->holdDaysSales = $holdDaysSales;

        return $this;
    }


    /**
     * Get the value of holdDaysRefunds
     */
    public function getHoldDaysRefunds(): ?int
    {
        return $this->holdDaysRefunds;
    }


    /**
     * Set the value of holdDaysRefunds
     *
     * @param int|null $holdDaysRefunds
     */
    public function setHoldDaysRefunds(?int $holdDaysRefunds): self
    {
        $this->holdDaysRefunds = $holdDaysRefunds;

        return $this;
    }


    /**
     * Get the value of cutOffTime
     */
    public function getCutOffTime(): ?Attribute\DateTime
    {
        return $this->cutOffTime;
    }


    /**
     * Set the value of cutOffTime
     *
     * @param Attribute\DateTime|null $cutOffTime
     */
    public function setCutOffTime(?Attribute\DateTime $cutOffTime): self
    {
        $this->cutOffTime = $cutOffTime;

        return $this;
    }


    /**
     * Get the value of entryClassCode
     */
    public function getEntryClassCode(): ?array
    {
        return $this->entryClassCode;
    }


    /**
     * Set the value of entryClassCode
     *
     * @param array|null $entryClassCode
     */
    public function setEntryClassCode(?array $entryClassCode): self
    {
        $this->entryClassCode = $entryClassCode;

        return $this;
    }


    /**
     * Get the value of nachaId
     */
    public function getNachaId(): ?string
    {
        return $this->nachaId;
    }


    /**
     * Set the value of nachaId
     *
     * @param string|null $nachaId
     */
    public function setNachaId(?string $nachaId): self
    {
        $this->nachaId = $nachaId;

        return $this;
    }


    /**
     * Get the value of dailyDebit
     */
    public function getDailyDebit(): ?float
    {
        return $this->dailyDebit;
    }


    /**
     * Set the value of dailyDebit
     *
     * @param float|null $dailyDebit
     */
    public function setDailyDebit(?float $dailyDebit): self
    {
        $this->dailyDebit = $dailyDebit;

        return $this;
    }


    /**
     * Get the value of dailyCredit
     */
    public function getDailyCredit(): ?float
    {
        return $this->dailyCredit;
    }


    /**
     * Set the value of dailyCredit
     *
     * @param float|null $dailyCredit
     */
    public function setDailyCredit(?float $dailyCredit): self
    {
        $this->dailyCredit = $dailyCredit;

        return $this;
    }


    /**
     * Get the value of monthlyDebit
     */
    public function getMonthlyDebit(): ?float
    {
        return $this->monthlyDebit;
    }


    /**
     * Set the value of monthlyDebit
     *
     * @param float|null $monthlyDebit
     */
    public function setMonthlyDebit(?float $monthlyDebit): self
    {
        $this->monthlyDebit = $monthlyDebit;

        return $this;
    }


    /**
     * Get the value of monthlyCredit
     */
    public function getMonthlyCredit(): ?float
    {
        return $this->monthlyCredit;
    }


    /**
     * Set the value of monthlyCredit
     *
     * @param float|null $monthlyCredit
     */
    public function setMonthlyCredit(?float $monthlyCredit): self
    {
        $this->monthlyCredit = $monthlyCredit;

        return $this;
    }


    /**
     * Get the value of perTransDebit
     */
    public function getPerTransDebit(): ?float
    {
        return $this->perTransDebit;
    }


    /**
     * Set the value of perTransDebit
     *
     * @param float|null $perTransDebit
     */
    public function setPerTransDebit(?float $perTransDebit): self
    {
        $this->perTransDebit = $perTransDebit;

        return $this;
    }


    /**
     * Get the value of perTransCredit
     */
    public function getPerTransCredit(): ?float
    {
        return $this->perTransCredit;
    }


    /**
     * Set the value of perTransCredit
     *
     * @param float|null $perTransCredit
     */
    public function setPerTransCredit(?float $perTransCredit): self
    {
        $this->perTransCredit = $perTransCredit;

        return $this;
    }
}
