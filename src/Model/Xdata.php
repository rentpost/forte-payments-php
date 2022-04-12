<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Helper;
use Rentpost\ForteApi\Serializer\ForteNormalizer\PreProcessDenormalizationInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Xdata
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Xdata extends AbstractModel implements NormalizableInterface, PreProcessDenormalizationInterface
{

    /**
     * @var string[]
     */
    protected array $xdatas = [];


    /**
     * @return string[]
     */
    public function getXdatas(): array
    {
        return $this->xdatas;
    }


    public function setXdatas(array $xdatas): self
    {
        $this->xdatas = $xdatas;

        return $this;
    }


    public function addXdata(string $xdata): self
    {
        $this->xdatas[] = $xdata;

        return $this;
    }


    public function normalize(
        NormalizerInterface $normalizer,
        ?string $format = null,
        array $context = [],
    ): array|string|int|float|bool
    {
        $arr = [];

        $i = 1;
        foreach ($this->getXdatas() as $xdata) {
            $arr['xdata_' . $i] = $normalizer->normalize($xdata);
            $i++;
        }

        return $arr;
    }


    public static function preProcessDataForDenormalization($data): array
    {
        return Helper::underscoredListItemsToArray($data, 'xdata', 'xdatas');
    }
}
