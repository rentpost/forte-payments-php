<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Model as Model;

/**
 * Application Collection
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class ApplicationCollection extends AbstractResultCollection
{

    /**
     * @internal only here so the Symfony serializer can detect the typehints
     *
     * @param Model\Application $application
     */
    public function addResult(Model\Application $application)
    {
    }
}
