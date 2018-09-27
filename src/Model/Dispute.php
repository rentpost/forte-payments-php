<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dispute model
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Dispute extends AbstractModel
{

    /**
     * @var Attribute\Id\DisputeId
     * @Assert\NotBlank()
     */
    protected $disputeId;

    /**
     * @var Attribute\Id\OrganizationId
     * @Assert\NotBlank()
     */
    protected $organizationId;

    /**
     * @var Attribute\Id\LocationId
     * @Assert\NotBlank()
     */
    protected $locationId;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"documents needed", "reviewing", "pending", "won", "lost"})
     */
    protected $status;

    /**
     * @var Attribute\Money
     * @Assert\NotBlank()
     */
    protected $disputeAmount;

    /**
     * @var Attribute\Money
     * @Assert\NotBlank()
     */
    protected $originalAmount;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $actionCode;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"DRFT", "PNOT", "CHBK"})
     */
    protected $adjustmentType;

    /**
     * @var Attribute\DateTime
     * @Assert\NotBlank()
     */
    protected $receivedDate;

    /**
     * @var Attribute\DateTime
     * @Assert\NotBlank()
     */
    protected $dueDate;

    /**
     * @var Attribute\DateTime
     * @Assert\NotBlank()
     */
    protected $lastUpdateDate;

    /**
     * @var Attribute\DateTime
     * @Assert\NotBlank()
     */
    protected $lastFundingDate;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $commentFromIssuer;

    /**
     * @var Model\Reason
     * @Assert\NotBlank()
     * @Assert\Valid
     */
    protected $reason;

    /**
     * @var Model\Card
     * @Assert\NotBlank()
     * @Assert\Valid
     */
    protected $card;

    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $disputeNumber;


    public function getDisputeId(): Attribute\Id\DisputeId
    {
        return $this->disputeId;
    }


    public function setDisputeId(Attribute\Id\DisputeId $disputeId): self
    {
        $this->disputeId = $disputeId;

        return $this;
    }


    public function getOrganizationId(): Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId)
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    public function getLocationId(): Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(Attribute\Id\LocationId $locationId): self
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


    public function getDisputeAmount(): Attribute\Money
    {
        return $this->disputeAmount;
    }


    public function setDisputeAmount(Attribute\Money $disputeAmount): self
    {
        $this->disputeAmount = $disputeAmount;

        return $this;
    }


    public function getOriginalAmount(): Attribute\Money
    {
        return $this->originalAmount;
    }


    public function setOriginalAmount(Attribute\Money $originalAmount): self
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


    public function getReceivedDate(): Attribute\DateTime
    {
        return $this->receivedDate;
    }


    public function setReceivedDate(Attribute\DateTime $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    public function getDueDate(): Attribute\DateTime
    {
        return $this->dueDate;
    }


    public function setDueDate(Attribute\DateTime $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }


    public function getLastUpdateDate(): Attribute\DateTime
    {
        return $this->lastUpdateDate;
    }


    public function setLastUpdateDate(Attribute\DateTime $lastUpdateDate): self
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }


    public function getLastFundingDate(): Attribute\DateTime
    {
        return $this->lastFundingDate;
    }


    public function setLastFundingDate(Attribute\DateTime $lastFundingDate): self
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


    public function getTransactionId(): string
    {
        return $this->transactionId;
    }


    public function setTransactionId(string $transactionId): self
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
