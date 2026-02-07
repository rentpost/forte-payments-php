<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;
use Rentpost\ForteApi\Attribute\Id\ApplicationId;
use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\IpAddress;
use Rentpost\ForteApi\Attribute\Money;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Application
 *
 * @author Jacob Thomason <sam@rentpost.com>
 */
class Application extends AbstractModel
{

    protected ?ApplicationId $applicationId = null;

    #[Assert\NotBlank]
    protected string $feeId;

    #[Assert\NotBlank]
    protected IpAddress $sourceIp;

    #[Assert\NotBlank]
    protected Money $annualVolume;

    #[Assert\NotBlank]
    protected Money $averageTransactionAmount;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['internet', 'phone', 'mail', 'point_of_sale'])]
    protected string $marketType;

    #[Assert\NotBlank]
    protected string $tAndCVersion;

    #[Assert\NotBlank]
    protected DateTime $tAndCTimeStamp;

    #[Assert\NotBlank]
    #[Assert\Length(max: 128)]
    #[Assert\Regex('/^[a-zA-Z0-9_-]*$/')]
    protected string $riskSessionId;

    #[Assert\NotBlank]
    #[Assert\Valid]
    protected ApplicantOrganization $applicantOrganization;

    #[Assert\Valid]
    protected Owner $owner1;

    #[Assert\Valid]
    protected ?Owner $owner2 = null;

    #[Assert\Valid]
    protected ?Owner $owner3 = null;

    #[Assert\Valid]
    protected ?Owner $owner4 = null;

    protected Money $maximumTransactionAmount;
    protected Money $averagePayableAmount;
    protected Money $maximumPayableAmount;
    protected Money $monthlyPayableVolume;

    // These are only available after the initial submission
    protected ?DateTime $receivedDate = null;
    protected ?DateTime $updatedDate = null;
    protected ?string $salesRep = null;
    protected ?string $feePlan = null;
    protected ?LocationId $locationId = null;

    #[Assert\Choice(choices: ['approved', 'pending', 'declined', 'enrolled', 'rejected', 'recalled'])]
    protected ?string $status = null;

    /** @var string[] */
    protected array $declineReason = [];


    public function getApplicationId(): ?ApplicationId
    {
        return $this->applicationId;
    }


    public function setApplicationId(?ApplicationId $applicationId): self
    {
        $this->applicationId = $applicationId;

        return $this;
    }


    public function getFeeId(): string
    {
        return $this->feeId;
    }


    public function setFeeId(string|int $feeId): self
    {
        $this->feeId = (string)$feeId;

        return $this;
    }


    public function getSourceIp(): IpAddress
    {
        return $this->sourceIp;
    }


    public function setSourceIp(IpAddress $sourceIp): self
    {
        $this->sourceIp = $sourceIp;

        return $this;
    }


    public function getAnnualVolume(): Money
    {
        return $this->annualVolume;
    }


    public function setAnnualVolume(Money $annualVolume): self
    {
        $this->annualVolume = $annualVolume;

        return $this;
    }


    public function getAverageTransactionAmount(): Money
    {
        return $this->averageTransactionAmount;
    }


    public function setAverageTransactionAmount(Money $averageTransactionAmount): self
    {
        $this->averageTransactionAmount = $averageTransactionAmount;

        return $this;
    }


    public function getMarketType(): string
    {
        return $this->marketType;
    }


    public function setMarketType(string $marketType): self
    {
        $this->marketType = $marketType;

        return $this;
    }


    public function getTAndCVersion(): string
    {
        return $this->tAndCVersion;
    }


    public function setTAndCVersion(string $tAndCVersion): self
    {
        $this->tAndCVersion = $tAndCVersion;

        return $this;
    }


    public function getTAndCTimeStamp(): DateTime
    {
        return $this->tAndCTimeStamp;
    }


    public function setTAndCTimeStamp(DateTime $tAndCTimeStamp): self
    {
        $this->tAndCTimeStamp = $tAndCTimeStamp;

        return $this;
    }


    public function getRiskSessionId(): string
    {
        return $this->riskSessionId;
    }


    public function setRiskSessionId(string $riskSessionId): self
    {
        $this->riskSessionId = $riskSessionId;

        return $this;
    }


    public function getApplicantOrganization(): ApplicantOrganization
    {
        return $this->applicantOrganization;
    }


    public function setApplicantOrganization(ApplicantOrganization $applicantOrganization): self
    {
        $this->applicantOrganization = $applicantOrganization;

        return $this;
    }


    public function getOwner1(): Owner
    {
        return $this->owner1;
    }


    public function setOwner1(Owner $owner): self
    {
        $this->owner1 = $owner;

        return $this;
    }


    public function getOwner2(): ?Owner
    {
        return $this->owner2;
    }


    public function setOwner2(?Owner $owner): self
    {
        $this->owner2 = $owner;

        return $this;
    }


    public function getOwner3(): ?Owner
    {
        return $this->owner3;
    }


    public function setOwner3(?Owner $owner): self
    {
        $this->owner3 = $owner;

        return $this;
    }


    public function getOwner4(): ?Owner
    {
        return $this->owner4;
    }


    public function setOwner4(?Owner $owner): self
    {
        $this->owner4 = $owner;

        return $this;
    }


    public function getMaximumTransactionAmount(): Money
    {
        return $this->maximumTransactionAmount;
    }


    public function setMaximumTransactionAmount(Money $maximumTransactionAmount): self
    {
        $this->maximumTransactionAmount = $maximumTransactionAmount;

        return $this;
    }


    public function getAveragePayableAmount(): Money
    {
        return $this->averagePayableAmount;
    }


    public function setAveragePayableAmount(Money $averagePayableAmount): self
    {
        $this->averagePayableAmount = $averagePayableAmount;

        return $this;
    }


    public function getMaximumPayableAmount(): Money
    {
        return $this->maximumPayableAmount;
    }


    public function setMaximumPayableAmount(Money $maximumPayableAmount): self
    {
        $this->maximumPayableAmount = $maximumPayableAmount;

        return $this;
    }


    public function getMonthlyPayableVolume(): Money
    {
        return $this->monthlyPayableVolume;
    }


    public function setMonthlyPayableVolume(Money $monthlyPayableVolume): self
    {
        $this->monthlyPayableVolume = $monthlyPayableVolume;

        return $this;
    }


    public function getReceivedDate(): ?DateTime
    {
        return $this->receivedDate;
    }


    public function setReceivedDate(?DateTime $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    public function getUpdatedDate(): ?DateTime
    {
        return $this->updatedDate;
    }


    public function setUpdatedDate(?DateTime $updatedDate): self
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }


    public function getSalesRep(): ?string
    {
        return $this->salesRep;
    }


    public function setSalesRep(?string $salesRep): self
    {
        $this->salesRep = $salesRep;

        return $this;
    }


    public function getFeePlan(): ?string
    {
        return $this->feePlan;
    }


    public function setFeePlan(?string $feePlan): self
    {
        $this->feePlan = $feePlan;

        return $this;
    }


    public function getLocationId(): ?LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    public function getStatus(): ?string
    {
        return $this->status;
    }


    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }


    /** @return string[] */
    public function getDeclineReason(): ?array
    {
        return $this->declineReason;
    }


    public function setDeclineReason(?array $declineReason): self
    {
        $this->declineReason = $declineReason;

        return $this;
    }
}
