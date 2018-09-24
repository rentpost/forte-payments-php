<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\ValidatingSerializer;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Filter\AbstractFilter;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @author Sam Anthony <sam@rentpost.com>
 *
 * Wraps/combines the Symfony serializer and Validator
 */
class ValidatingSerializer
{
    /** @var Serializer */
    protected $internalSerializer;

    /** @var Validator */
    protected $internalValidator;

    public function __construct(Serializer $serializer, ValidatorInterface $validator)
    {
        $this->internalSerializer = $serializer;
        $this->internalValidator = $validator;
    }

    public function serialize(ValidatableSerializableInterface $object): string
    {
        $this->validate($object);

        return $this->internalSerializer->serialize($object, 'json');
    }


    public function deserialize(string $json, string $responseFqns): ValidatableSerializableInterface
    {
        return $this->internalSerializer->deserialize($json, $responseFqns, 'json');
    }

    /**
     * Validates the object, throws exception on validation error
     *
     * @param ValidatableSerializableInterface $object
     */
    protected function validate(ValidatableSerializableInterface $object): void
    {
        $violations = $this->internalValidator->validate($object);

        if ($violations->count() === 0) {
            return; // Every thing is ok
        }

        $exceptionMessage = get_class($object) . '` failed to validate';

        foreach($violations as $violation) {
            $exceptionMessage .= ' | `' . $violation->getPropertyPath() . '` ' . $violation->getMessage();
        }

        throw new ValidationException($exceptionMessage);
    }

    /**
     * @inheritDoc
     */
    protected function getExpectedType(): string
    {
        return AbstractModel::class;
    }


    public function normalizePagination(PaginationData $paginationData): array
    {
        $this->validate($paginationData);

        return $this->internalSerializer->normalize($paginationData);
    }


    public function normalizeFilter(AbstractFilter $filter): array
    {
        $this->validate($filter);

        return $this->internalSerializer->normalize($filter);
    }


}
