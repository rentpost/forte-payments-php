<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;
use Rentpost\ForteApi\Attribute\Id\DisputeId;
use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\Id\TransactionId;
use Rentpost\ForteApi\Attribute\Money;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dispute model
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Dispute extends AbstractModel
{

    protected DisputeId $disputeId;
    protected OrganizationId $organizationId;
    protected LocationId $locationId;

    #[Assert\NotBlank]
    #[Assert\Choice(['documents needed', 'reviewing', 'pending', 'won', 'lost'])]
    protected string $status;

    protected Money $disputeAmount;
    protected Money $originalAmount;

    #[Assert\NotBlank]
    protected string $actionCode;

    #[Assert\NotBlank]
    #[Assert\Choice(['DRFT', 'PNOT', 'CHBK'])]
    protected string $adjustmentType;

    protected DateTime $receivedDate;
    protected DateTime $dueDate;
    protected DateTime $lastUpdateDate;
    protected DateTime $lastFundingDate;

    #[Assert\NotBlank]
    protected string $commentFromIssuer;

    #[Assert\Valid]
    protected Reason $reason;

    #[Assert\Valid]
    protected Card $card;

    protected TransactionId $transactionId;

    #[Assert\NotBlank]
    protected string $disputeNumber;


    public function getDisputeId(): DisputeId
    {
        return $this->disputeId;
    }


    public function setDisputeId(DisputeId $disputeId): self
    {
        $this->disputeId = $disputeId;

        return $this;
    }


    public function getOrganizationId(): OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    public function getLocationId(): LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }


    public function getDisputeAmount(): Money
    {
        return $this->disputeAmount;
    }


    public function setDisputeAmount(Money $disputeAmount): self
    {
        $this->disputeAmount = $disputeAmount;

        return $this;
    }


    public function getOriginalAmount(): Money
    {
        return $this->originalAmount;
    }


    public function setOriginalAmount(Money $originalAmount): self
    {
        $this->originalAmount = $originalAmount;

        return $this;
    }


    public function getActionCode(): string
    {
        return $this->actionCode;
    }


    public function setActionCode(string $actionCode): self
    {
        $this->actionCode = $actionCode;

        return $this;
    }


    public function getAdjustmentType(): string
    {
        return $this->adjustmentType;
    }


    public function setAdjustmentType(string $adjustmentType): self
    {
        $this->adjustmentType = $adjustmentType;

        return $this;
    }


    public function getReceivedDate(): DateTime
    {
        return $this->receivedDate;
    }


    public function setReceivedDate(DateTime $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }


    public function setDueDate(DateTime $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }


    public function getLastUpdateDate(): DateTime
    {
        return $this->lastUpdateDate;
    }


    public function setLastUpdateDate(DateTime $lastUpdateDate): self
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }


    public function getLastFundingDate(): DateTime
    {
        return $this->lastFundingDate;
    }


    public function setLastFundingDate(DateTime $lastFundingDate): self
    {
        $this->lastFundingDate = $lastFundingDate;

        return $this;
    }


    public function getCommentFromIssuer(): string
    {
        return $this->commentFromIssuer;
    }


    public function setCommentFromIssuer(string $commentFromIssuer): self
    {
        $this->commentFromIssuer = $commentFromIssuer;

        return $this;
    }


    public function getReason(): Reason
    {
        return $this->reason;
    }


    public function setReason(Reason $reason): self
    {
        $this->reason = $reason;

        return $this;
    }


    public function getCard(): Card
    {
        return $this->card;
    }


    public function setCard(Card $card): self
    {
        $this->card = $card;

        return $this;
    }


    public function getTransactionId(): TransactionId
    {
        return $this->transactionId;
    }


    public function setTransactionId(TransactionId $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }


    public function getDisputeNumber(): string
    {
        return $this->disputeNumber;
    }


    public function setDisputeNumber(string $disputeNumber): self
    {
        $this->disputeNumber = $disputeNumber;

        return $this;
    }
}
