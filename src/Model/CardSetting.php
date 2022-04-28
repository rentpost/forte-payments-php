<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CardSetting model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class CardSetting extends AbstractModel
{

    /**
     * @var Attribute\DateTime|null
     */
    protected $cutOffTime;

    /**
     * @var string|null
     */
    #[Assert\Choice(['internet', 'phone', 'mail', 'point_of_sale'])]
    protected $marketType;

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
     * @var int|null
     */
    protected $serviceFeeAdditionalAmount;

    /**
     * @var array|null
     */
    protected $serviceFeeRange;

    /**
     * @var array|null
     */
    protected $serviceFeeTiered;

    /**
     * @var float|null
     */
    protected $serviceFeeVisaTaxAmount;

    /**
     * @var array|null
     */
    #[Assert\Choice(['VISA', 'AMEX', 'MC', 'JCB', 'DISC'])]
    protected $cardTypes;

    /**
     * @var string|null
     */
    #[Assert\Choice(['enabled', 'disabled'])]
    protected $accountUpdater;

    /**
     * @var bool|null
     */
    #[Assert\Choice([true, false])]
    protected $gateway;

    /**
     * @var string|null
     */
    protected $platform;

    /**
     * @var string|null
     */
    protected $bin;

    /**
     * @var string|null
     */
    protected $tid;

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
     * Get the value of marketType
     */
    public function getMarketType(): ?string
    {
        return $this->marketType;
    }


    /**
     * Set the value of marketType
     *
     * @param string|null $marketType
     */
    public function setMarketType(?string $marketType): self
    {
        $this->marketType = $marketType;

        return $this;
    }


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
     * Get the value of serviceFeeVisaTaxAmount
     */
    public function getServiceFeeVisaTaxAmount(): ?float
    {
        return $this->serviceFeeVisaTaxAmount;
    }


    /**
     * Set the value of serviceFeeVisaTaxAmount
     *
     * @param int|null $serviceFeeVisaTaxAmount
     */
    public function setServiceFeeVisaTaxAmount(?float $serviceFeeVisaTaxAmount): self
    {
        $this->serviceFeeVisaTaxAmount = $serviceFeeVisaTaxAmount;

        return $this;
    }


    /**
     * Get the list of cardTypes
     */
    public function getCardTypes(): ?array
    {
        return $this->cardTypes;
    }


    /**
     * Set the list of cardTypes
     *
     * @param array|null $cardTypes
     */
    public function setCardTypes(?array $cardTypes): self
    {
        $this->cardTypes = $cardTypes;

        return $this;
    }


    /**
     * Get the value of accountUpdater
     */
    public function getAccountUpdater(): ?string
    {
        return $this->accountUpdater;
    }


    /**
     * Set the value of accountUpdater
     *
     * @param string|null $accountUpdater
     */
    public function setAccountUpdater(?string $accountUpdater): self
    {
        $this->accountUpdater = $accountUpdater;

        return $this;
    }


    /**
     * Get the value of gateway
     */
    public function getGateway(): ?bool
    {
        return $this->gateway;
    }


    /**
     * Set the value of gateway
     *
     * @param bool|null $gateway
     */
    public function setGateway(?bool $gateway): self
    {
        $this->gateway = $gateway;

        return $this;
    }


    /**
     * Get the value of platform
     */
    public function getPlatform(): ?string
    {
        return $this->platform;
    }


    /**
     * Set the value of platform
     *
     * @param string|null $platform
     */
    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }


    /**
     * Get the value of bin
     */
    public function getBin(): ?string
    {
        return $this->bin;
    }


    /**
     * Set the value of bin
     *
     * @param string|null $bin
     */
    public function setBin(?string $bin): self
    {
        $this->bin = $bin;

        return $this;
    }


    /**
     * Get the value of tid
     */
    public function getTid(): ?string
    {
        return $this->tid;
    }


    /**
     * Set the value of tid
     *
     * @param string|null $tid
     */
    public function setTid(?string $tid): self
    {
        $this->tid = $tid;

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
