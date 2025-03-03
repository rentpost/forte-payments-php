<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;

/**
 * EcheckSetting model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class EcheckSetting extends AbstractModel
{

    protected ?int $serviceFeePercentage = null;
    protected ?int $serviceFeeMinAmount = null;
    protected ?int $serviceFeeAmount = null;

    /** @var int[] */
    protected ?array $serviceFeeRange = null;

    /** @var int[] */
    protected ?array $serviceFeeTiered = null;

    protected ?int $serviceFeeAdditionalAmount = null;
    protected ?int $holdDaysSales = null;
    protected ?int $holdDaysRefunds = null;
    protected ?DateTime $cutOffTime = null;

    /** @var string[] */
    protected ?array $entryClassCode = null;

    protected ?string $nachaId = null;
    protected ?float $dailyDebit = null;
    protected ?float $dailyCredit = null;
    protected ?float $monthlyDebit = null;
    protected ?float $monthlyCredit = null;
    protected ?float $perTransDebit = null;
    protected ?float $perTransCredit = null;


    public function getServiceFeePercentage(): ?int
    {
        return $this->serviceFeePercentage;
    }


    public function setServiceFeePercentage(?int $serviceFeePercentage): self
    {
        $this->serviceFeePercentage = $serviceFeePercentage;

        return $this;
    }


    public function getServiceFeeMinAmount(): ?int
    {
        return $this->serviceFeeMinAmount;
    }


    public function setServiceFeeMinAmount(?int $serviceFeeMinAmount): self
    {
        $this->serviceFeeMinAmount = $serviceFeeMinAmount;

        return $this;
    }


    public function getServiceFeeAmount(): ?int
    {
        return $this->serviceFeeAmount;
    }


    public function setServiceFeeAmount(?int $serviceFeeAmount): self
    {
        $this->serviceFeeAmount = $serviceFeeAmount;

        return $this;
    }


    /** @return int[]|null */
    public function getServiceFeeRange(): ?array
    {
        return $this->serviceFeeRange;
    }


    /** @param int[]|null $serviceFeeRange */
    public function setServiceFeeRange(?array $serviceFeeRange): self
    {
        $this->serviceFeeRange = $serviceFeeRange;

        return $this;
    }


    /** @return int[]|null */
    public function getServiceFeeTiered(): ?array
    {
        return $this->serviceFeeTiered;
    }


    /** @param int[]|null $serviceFeeTiered */
    public function setServiceFeeTiered(?array $serviceFeeTiered): self
    {
        $this->serviceFeeTiered = $serviceFeeTiered;

        return $this;
    }


    public function getServiceFeeAdditionalAmount(): ?int
    {
        return $this->serviceFeeAdditionalAmount;
    }


    public function setServiceFeeAdditionalAmount(?int $serviceFeeAdditionalAmount): self
    {
        $this->serviceFeeAdditionalAmount = $serviceFeeAdditionalAmount;

        return $this;
    }


    public function getHoldDaysSales(): ?int
    {
        return $this->holdDaysSales;
    }


    public function setHoldDaysSales(?int $holdDaysSales): self
    {
        $this->holdDaysSales = $holdDaysSales;

        return $this;
    }


    public function getHoldDaysRefunds(): ?int
    {
        return $this->holdDaysRefunds;
    }


    public function setHoldDaysRefunds(?int $holdDaysRefunds): self
    {
        $this->holdDaysRefunds = $holdDaysRefunds;

        return $this;
    }


    public function getCutOffTime(): ?DateTime
    {
        return $this->cutOffTime;
    }


    public function setCutOffTime(?DateTime $cutOffTime): self
    {
        $this->cutOffTime = $cutOffTime;

        return $this;
    }


    /** @return string[]|null */
    public function getEntryClassCode(): ?array
    {
        return $this->entryClassCode;
    }


    /** @param string[]|null $entryClassCode */
    public function setEntryClassCode(?array $entryClassCode): self
    {
        $this->entryClassCode = $entryClassCode;

        return $this;
    }


    public function getNachaId(): ?string
    {
        return $this->nachaId;
    }


    public function setNachaId(?string $nachaId): self
    {
        $this->nachaId = $nachaId;

        return $this;
    }


    public function getDailyDebit(): ?float
    {
        return $this->dailyDebit;
    }


    public function setDailyDebit(?float $dailyDebit): self
    {
        $this->dailyDebit = $dailyDebit;

        return $this;
    }


    public function getDailyCredit(): ?float
    {
        return $this->dailyCredit;
    }


    public function setDailyCredit(?float $dailyCredit): self
    {
        $this->dailyCredit = $dailyCredit;

        return $this;
    }


    public function getMonthlyDebit(): ?float
    {
        return $this->monthlyDebit;
    }


    public function setMonthlyDebit(?float $monthlyDebit): self
    {
        $this->monthlyDebit = $monthlyDebit;

        return $this;
    }


    public function getMonthlyCredit(): ?float
    {
        return $this->monthlyCredit;
    }


    public function setMonthlyCredit(?float $monthlyCredit): self
    {
        $this->monthlyCredit = $monthlyCredit;

        return $this;
    }


    public function getPerTransDebit(): ?float
    {
        return $this->perTransDebit;
    }


    public function setPerTransDebit(?float $perTransDebit): self
    {
        $this->perTransDebit = $perTransDebit;

        return $this;
    }


    public function getPerTransCredit(): ?float
    {
        return $this->perTransCredit;
    }


    public function setPerTransCredit(?float $perTransCredit): self
    {
        $this->perTransCredit = $perTransCredit;

        return $this;
    }
}
