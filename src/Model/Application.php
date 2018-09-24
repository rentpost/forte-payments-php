<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Application
 *
 * @author Jacob Thomason <sam@rentpost.com>
 */
class Application extends AbstractModel
{

    /** @var Attribute\Id\ApplicationId */
    protected $applicationId;

    /** @var string */
    protected $status;

    /**
     * @var mixed
     * @Assert\NotBlank()
     */
    protected $feeId;

    /**
     * @var Attribute\IpAddress
     * @Assert\NotBlank()
     */
    protected $sourceIp;

    /**
     * @var Attribute\Money
     * @Assert\NotBlank()
     */
    protected $annualVolume;

    /**
     * @var Attribute\Money
     * @Assert\NotBlank()
     */
    protected $averageTransactionAmount;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"internet", "phone", "mail", "point_of_sale"})
     */
    protected $marketType;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $tAndCVersion;

    /**
     * @var Attribute\DateTime
     * @Assert\NotBlank()
     */
    protected $tAndCTimeStamp;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=128)
     * @Assert\Regex("/^[a-zA-Z0-9_-]*$/")
     */
    protected $riskSessionId;

    /**
     * @var Model\ApplicantOrganization
     * @Assert\NotBlank()
     */
    protected $applicantOrganization;

    /**
     * @var Model\Owner
     * @Assert\NotBlank()
     */
    protected $owner1;

    /**
     * @var Model\Owner
     */
    protected $owner2;

    /**
     * @var Model\Owner
     */
    protected $owner3;

    /**
     * @var Model\Owner
     */
    protected $owner4;

    /**
     * @var Attribute\Money
     */
    protected $maximumTransactionAmount;

    /**
     * @var Attribute\Money
     */
    protected $averagePayableAmount;

    /**
     * @var Attribute\Money
     */
    protected $maximumPayableAmount;

    /**
     * @var Attribute\Money
     */
    protected $monthlyPayableVolume;

    /**
     * @var Attribute\DateTime
     */
    protected $receivedDate;

    /**
     * @var Attribute\DateTime
     */
    protected $updatedDate;

    /**
     * @var string
     */
    protected $salesRep;

    /**
     * @var string
     */
    protected $feePlan;

    /**
     * @var Attribute\Id\LocationId
     */
    protected $locationId;


    public function getStatus(): ?string
    {
        return $this->status;
    }


    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }


    public function getApplicationId(): ?Attribute\Id\ApplicationId
    {
        return $this->applicationId;
    }


    public function setApplicationId(Attribute\Id\ApplicationId $applicationId): self
    {
        $this->applicationId = $applicationId;

        return $this;
    }


    public function getFeeId()
    {
        return $this->feeId;
    }


    public function setFeeId($feeId): self
    {
        $this->feeId = $feeId;

        return $this;
    }


    public function getSourceIp(): Attribute\IpAddress
    {
        return $this->sourceIp;
    }


    public function setSourceIp(Attribute\IpAddress $sourceIp): self
    {
        $this->sourceIp = $sourceIp;

        return $this;
    }


    public function getAnnualVolume(): Attribute\Money
    {
        return $this->annualVolume;
    }


    public function setAnnualVolume(Attribute\Money $annualVolume): self
    {
        $this->annualVolume = $annualVolume;

        return $this;
    }


    public function getAverageTransactionAmount(): Attribute\Money
    {
        return $this->averageTransactionAmount;
    }


    public function setAverageTransactionAmount(Attribute\Money $averageTransactionAmount): self
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


    public function getTAndCTimeStamp(): Attribute\DateTime
    {
        return $this->tAndCTimeStamp;
    }


    public function setTAndCTimeStamp(Attribute\DateTime $tAndCTimeStamp): self
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


    public function getApplicantOrganization(): Model\ApplicantOrganization
    {
        return $this->applicantOrganization;
    }


    public function setApplicantOrganization(Model\ApplicantOrganization $applicantOrganization): self
    {
        $this->applicantOrganization = $applicantOrganization;

        return $this;
    }


    public function getOwner1(): Model\Owner
    {
        return $this->owner1;
    }


    public function setOwner1(Model\Owner $owner): self
    {
        $this->owner1 = $owner;

        return $this;
    }


    public function getOwner2(): ?Model\Owner
    {
        return $this->owner2;
    }


    public function setOwner2(?Model\Owner $owner): self
    {
        $this->owner2 = $owner;

        return $this;
    }


    public function getOwner3(): ?Model\Owner
    {
        return $this->owner3;
    }


    public function setOwner3(?Model\Owner $owner): self
    {
        $this->owner3 = $owner;

        return $this;
    }


    public function getOwner4(): ?Model\Owner
    {
        return $this->owner4;
    }


    public function setOwner4(?Model\Owner $owner): self
    {
        $this->owner4 = $owner;

        return $this;
    }


    public function getMaximumTransactionAmount(): Attribute\Money
    {
        return $this->maximumTransactionAmount;
    }


    public function setMaximumTransactionAmount(Attribute\Money $maximumTransactionAmount): self
    {
        $this->maximumTransactionAmount = $maximumTransactionAmount;

        return $this;
    }


    public function getAveragePayableAmount(): Attribute\Money
    {
        return $this->averagePayableAmount;
    }


    public function setAveragePayableAmount(Attribute\Money $averagePayableAmount): self
    {
        $this->averagePayableAmount = $averagePayableAmount;

        return $this;
    }


    public function getMaximumPayableAmount(): Attribute\Money
    {
        return $this->maximumPayableAmount;
    }


    public function setMaximumPayableAmount(Attribute\Money$maximumPayableAmount): self
    {
        $this->maximumPayableAmount = $maximumPayableAmount;

        return $this;
    }


    public function getMonthlyPayableVolume(): Attribute\Money
    {
        return $this->monthlyPayableVolume;
    }


    public function setMonthlyPayableVolume(Attribute\Money $monthlyPayableVolume): self
    {
        $this->monthlyPayableVolume = $monthlyPayableVolume;

        return $this;
    }


    public function getReceivedDate(): ?Attribute\DateTime
    {
        return $this->receivedDate;
    }


    public function setReceivedDate(Attribute\DateTime $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    public function getUpdatedDate(): ?Attribute\DateTime
    {
        return $this->updatedDate;
    }


    public function setUpdatedDate(Attribute\DateTime $updatedDate): self
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }


    public function getSalesRep(): ?string
    {
        return $this->salesRep;
    }


    public function setSalesRep(string $salesRep): self
    {
        $this->salesRep = $salesRep;

        return $this;
    }


    public function getFeePlan(): ?string
    {
        return $this->feePlan;
    }


    public function setFeePlan(string $feePlan): self
    {
        $this->feePlan = $feePlan;

        return $this;
    }


    public function getLocationId(): ?Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(Attribute\Id\LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }
}
