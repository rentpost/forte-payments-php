<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LocationCollection
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class LocationCollection extends AbstractResultCollection
{

    /**
     * @internal only here so the Symfony serializer can detect the typehints
     *
     * @param Model\Location $location
     */
    public function addResult(Model\Location $location)
    {
    }
}
