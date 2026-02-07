<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CardSetting model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class CardSetting extends AbstractModel
{

    protected ?DateTime $cutOffTime = null;

    #[Assert\Choice(choices: ['internet', 'phone', 'mail', 'point_of_sale'])]
    protected ?string $marketType = null;

    protected ?int $serviceFeePercentage = null;
    protected ?int $serviceFeeMinAmount = null;
    protected ?int $serviceFeeAmount = null;
    protected ?int $serviceFeeAdditionalAmount = null;

    /** @var int[]|null */
    protected ?array $serviceFeeRange = null;

    /** @var int[]|null */
    protected ?array $serviceFeeTiered = null;

    protected ?float $serviceFeeVisaTaxAmount = null;

    /** @var string[] */
    #[Assert\Choice(choices: ['VISA', 'AMEX', 'MC', 'JCB', 'DISC'])]
    protected ?array $cardTypes = null;

    #[Assert\Choice(choices: ['enabled', 'disabled'])]
    protected ?string $accountUpdater = null;

    #[Assert\Choice(choices: [true, false])]
    protected ?bool $gateway = null;

    protected ?string $platform = null;
    protected ?string $bin = null;
    protected ?string $tid = null;
    protected ?float $dailyDebit = null;
    protected ?float $dailyCredit = null;
    protected ?float $monthlyDebit = null;
    protected ?float $monthlyCredit = null;
    protected ?float $perTransDebit = null;
    protected ?float $perTransCredit = null;


    public function getCutOffTime(): ?DateTime
    {
        return $this->cutOffTime;
    }


    public function setCutOffTime(?DateTime $cutOffTime): self
    {
        $this->cutOffTime = $cutOffTime;

        return $this;
    }


    public function getMarketType(): ?string
    {
        return $this->marketType;
    }


    public function setMarketType(?string $marketType): self
    {
        $this->marketType = $marketType;

        return $this;
    }


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


    public function getServiceFeeAdditionalAmount(): ?int
    {
        return $this->serviceFeeAdditionalAmount;
    }


    public function setServiceFeeAdditionalAmount(?int $serviceFeeAdditionalAmount): self
    {
        $this->serviceFeeAdditionalAmount = $serviceFeeAdditionalAmount;

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


    public function getServiceFeeVisaTaxAmount(): ?float
    {
        return $this->serviceFeeVisaTaxAmount;
    }


    public function setServiceFeeVisaTaxAmount(?float $serviceFeeVisaTaxAmount): self
    {
        $this->serviceFeeVisaTaxAmount = $serviceFeeVisaTaxAmount;

        return $this;
    }


    /** @return string[]|null */
    public function getCardTypes(): ?array
    {
        return $this->cardTypes;
    }


    /** @param string[]|null $cardTypes */
    public function setCardTypes(?array $cardTypes): self
    {
        $this->cardTypes = $cardTypes;

        return $this;
    }


    public function getAccountUpdater(): ?string
    {
        return $this->accountUpdater;
    }


    public function setAccountUpdater(?string $accountUpdater): self
    {
        $this->accountUpdater = $accountUpdater;

        return $this;
    }


    public function getGateway(): ?bool
    {
        return $this->gateway;
    }


    public function setGateway(?bool $gateway): self
    {
        $this->gateway = $gateway;

        return $this;
    }


    public function getPlatform(): ?string
    {
        return $this->platform;
    }


    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }


    public function getBin(): ?string
    {
        return $this->bin;
    }


    public function setBin(?string $bin): self
    {
        $this->bin = $bin;

        return $this;
    }


    public function getTid(): ?string
    {
        return $this->tid;
    }


    public function setTid(?string $tid): self
    {
        $this->tid = $tid;

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
