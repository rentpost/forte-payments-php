<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Helper;
use Rentpost\ForteApi\Serializer\ForteNormalizer\PreProcessDenormalizationInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Xdata
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Xdata extends AbstractModel implements NormalizableInterface, PreProcessDenormalizationInterface
{
    
    /**
     * @var string[]
     */
    protected $xdatas = [];


    /**
     * @return string[]
     */
    public function getXdatas(): array
    {
        return $this->xdatas;
    }


    /**
     * @param string[] $xdatas
     *
     * @return self
     */
    public function setXdatas(array $xdatas): self
    {
        $this->xdatas = $xdatas;

        return $this;
    }


    /**
     * @param string $xdata
     *
     * @return self
     */
    public function addXdata(string $xdata): self
    {
        $this->xdatas[] = $xdata;

        return $this;
    }


    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $arr = [];

        $i = 1;
        foreach ($this->getXdatas() as $xdata)
        {
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
