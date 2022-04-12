<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Helper;
use Rentpost\ForteApi\Serializer\ForteNormalizer\PreProcessDenormalizationInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Validator\Constraints as Assert;

class LineItems extends AbstractModel implements NormalizableInterface, PreProcessDenormalizationInterface
{
    /**
     * @var Attribute\CommaList
     * @Assert\NotBlank()
     */
    protected $lineItemHeader;

    /**
     * @var Attribute\CommaList[]
     * @Assert\NotBlank()
     */
    protected $lineItems;


    /**
     * @return Attribute\CommaList
     */
    public function getLineItemHeader(): Attribute\CommaList
    {
        return $this->lineItemHeader;
    }


    /**
     * @param Attribute\CommaList $lineItemHeader
     *
     * @return self
     */
    public function setLineItemHeader(Attribute\CommaList $lineItemHeader): self
    {
        $this->lineItemHeader = $lineItemHeader;

        return $this;
    }


    /**
     * @return array
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }


    /**
     * @param Attribute\CommaList[] $lineItems
     *
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        $this->lineItems = $lineItems;

        return $this;
    }


    /**
     * @param Attribute\CommaList $line_item
     *
     * @return self
     */
    public function addLineItem(Attribute\CommaList $line_item): self
    {
        $this->lineItems[] = $line_item;

        return $this;
    }


    public function normalize(
        NormalizerInterface $normalizer,
        ?string $format = null,
        array $context = [],
    ): array|string|int|float|bool
    {
        $arr['line_item_header'] = $normalizer->normalize($this->getLineItemHeader());

        $underscoredItems = Helper::underscoredListItemsToArrayReverse($normalizer, $this->getLineItems(), 'line_item');

        $arr = array_merge($arr, $underscoredItems);

        return $arr;
    }


    public static function preProcessDataForDenormalization($data): array
    {
        return Helper::underscoredListItemsToArray($data, 'line_item', 'line_items');
    }

}
