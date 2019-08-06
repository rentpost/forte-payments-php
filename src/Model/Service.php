<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Service model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Service extends AbstractModel
{

    /**
     * @var Model\EcheckSetting
     * @Assert\NotBlank()
     * @Assert\Valid
     */
    protected $echeck;

    /**
     * @var Model\CardSetting
     * @Assert\NotBlank()
     * @Assert\Valid
     */
    protected $card;


    /**
     * Get the value of echeck
     */
    public function getEcheck(): Model\EcheckSetting
    {
        return $this->echeck;
    }


    /**
     * Set the value of echeck
     *
     * @param Model\EcheckSetting $echeck
     */
    public function setEcheck(Model\EcheckSetting $echeck): self
    {
        $this->echeck = $echeck;

        return $this;
    }


    /**
     * Get the value of card
     */
    public function getCard(): Model\CardSetting
    {
        return $this->card;
    }


    /**
     * Set the value of card
     *
     * @param Model\CardSetting $card
     */
    public function setCard(Model\CardSetting $card): self
    {
        $this->card = $card;

        return $this;
    }
}
