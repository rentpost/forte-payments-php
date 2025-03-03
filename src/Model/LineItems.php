<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\CommaList;
use Rentpost\ForteApi\Helper;
use Rentpost\ForteApi\Serializer\ForteNormalizer\PreProcessDenormalizationInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * LineItems
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class LineItems extends AbstractModel implements NormalizableInterface, PreProcessDenormalizationInterface
{

    protected CommaList $lineItemHeader;

    /** @var CommaList[] */
    protected array $lineItems;


    public function getLineItemHeader(): CommaList
    {
        return $this->lineItemHeader;
    }


    public function setLineItemHeader(CommaList $lineItemHeader): self
    {
        $this->lineItemHeader = $lineItemHeader;

        return $this;
    }


    /** @return CommaList[] */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }


    /** @param CommaList[] $lineItems */
    public function setLineItems(array $lineItems): self
    {
        $this->lineItems = $lineItems;

        return $this;
    }


    public function addLineItem(CommaList $lineItem): self
    {
        $this->lineItems[] = $lineItem;

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


    /** @return mixed[] */
    public static function preProcessDataForDenormalization(mixed $data): array
    {
        return Helper::underscoredListItemsToArray($data, 'line_item', 'line_items');
    }
}
