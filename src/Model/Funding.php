<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Funding
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Funding extends AbstractModel
{

    protected Attribute\Id\OrganizationId $organizationId;
    protected Attribute\Id\LocationId $locationId;

    #[Assert\Choice(['completed', 'pending', 'failed', 'not_applicable'])]
    protected string $status;

    protected Attribute\DateTime $effectiveDate;
    protected Attribute\DateTime $originationDate;
    protected Attribute\Decimal $netAmount;
    protected Echeck $echeck;
    protected FundingSource $fundingSource;
    protected string $entryDescription;
    protected string $fundingResponseCode;


    /**
     * The identification number of the associated organization.
     * For example, org_5551236.
     */
    public function getOrganizationId(): Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    /**
     * @internal api read only field
     */
    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    /**
     * The identification number of the associated location.
     * For example, loc_1234568.
     */
    public function getLocationId(): Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    /**
     * @internal api read only field
     */
    public function setLocationId(Attribute\Id\LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    /**
     * The status of the funding.
     * Possible values are: completed, pending, failed, not_applicable.
     */
    public function getStatus(): string
    {
        return $this->status;
    }


    /**
     * @internal api read only field
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }


    /**
     * The date and time when the net_amount is credited to the merchant's bank account.
     */
    public function getEffectiveDate(): Attribute\DateTime
    {
        return $this->effectiveDate;
    }


    /**
     * @internal api read only field
     */
    public function setEffectiveDate(Attribute\DateTime $effectiveDate): self
    {
        $this->effectiveDate = $effectiveDate;

        return $this;
    }


    /**
     * The date the funds of the transaction go to the originating depository financial institution.
     */
    public function getOriginationDate(): Attribute\DateTime
    {
        return $this->originationDate;
    }


    /**
     * @internal api read only field
     */
    public function setOriginationDate(Attribute\DateTime $originationDate): self
    {
        $this->originationDate = $originationDate;

        return $this;
    }


    /**
     * The amount that is being funded.
     */
    public function getNetAmount(): Attribute\Decimal
    {
        return $this->netAmount;
    }


    /**
     * @internal api read only field
     */
    public function setNetAmount(Attribute\Decimal $netAmount): self
    {
        $this->netAmount = $netAmount;

        return $this;
    }


    /**
     * The echeck information.
     */
    public function getEcheck(): Echeck
    {
        return $this->echeck;
    }


    /**
     * @internal api read only field
     */
    public function setEcheck(Echeck $echeck): self
    {
        $this->echeck = $echeck;

        return $this;
    }


    /**
     * The funding source information.
     */
    public function getFundingSource(): FundingSource
    {
        return $this->fundingSource;
    }


    /**
     * @internal api read only field
     */
    public function setFundingSource(FundingSource $fundingSource): self
    {
        $this->fundingSource = $fundingSource;

        return $this;
    }


    /**
     * Details pertaining to the funding entry that can be overwritten by the merchant after the
     * funds are in the merchant's bank account.
     */
    public function getEntryDescription(): string
    {
        return $this->entryDescription;
    }


    /**
     * @internal api read only field
     */
    public function setEntryDescription(string $entryDescription): self
    {
        $this->entryDescription = $entryDescription;

        return $this;
    }


    /**
     * Contains the reason code for why a funding attempt failed, but also the success response codes.
     */
    public function getFundingResponseCode(): string
    {
        return $this->fundingResponseCode;
    }


    /**
     * @internal api read only field
     */
    public function setFundingResponseCode(string $fundingResponseCode): self
    {
        $this->fundingResponseCode = $fundingResponseCode;

        return $this;
    }
}
