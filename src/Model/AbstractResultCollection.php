<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Child classes should implement `addResult()` and use the correct PHP7 Typenits
 * This method will never be called by the typehint is detected by the symfony serializer
 * so it know what model each array element will contain.
 *
 */
abstract class AbstractResultCollection extends AbstractModel
{
    /**
     * @var Model\AbstractModel[]
     */
    protected $results;

    /**
     * @var int
     */
    protected $numberResults;


    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @internal api read only field
     *
     * @param Model\AbstractModel[] $results
     */
    public function setResults(array $results)
    {
        $this->results = $results;
    }


    /**
     * @return int
     */
    public function getNumberResults(): int
    {
        return $this->numberResults;
    }


    /**
     * @internal api read only field
     *
     * @param int $numberResults
     *
     * @return self
     */
    public function setNumberResults(int $numberResults): self
    {
        $this->numberResults = $numberResults;

        return $this;
    }
}
