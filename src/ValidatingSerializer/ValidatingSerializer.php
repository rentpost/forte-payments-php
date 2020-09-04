<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\ValidatingSerializer;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Filter\AbstractFilter;
use Rentpost\ForteApi\Model\AbstractModel;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Wraps/combines the Symfony serializer and Validator
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class ValidatingSerializer
{

    protected Serializer $internalSerializer;
    protected ValidatorInterface $internalValidator;


    /**
     * Constructor
     */
    public function __construct(Serializer $serializer, ValidatorInterface $validator)
    {
        $this->internalSerializer = $serializer;
        $this->internalValidator = $validator;
    }


    /**
     * Serializes an object
     */
    public function serialize(ValidatableSerializableInterface $object): string
    {
        $this->validate($object);

        return $this->internalSerializer->serialize($object, 'json');
    }


    /**
     * Deserialized an object
     */
    public function deserialize(string $json, string $responseFqns): ValidatableSerializableInterface
    {
        return $this->internalSerializer->deserialize($json, $responseFqns, 'json');
    }


    /**
     * Validates the object, throws exception on validation error
     */
    protected function validate(ValidatableSerializableInterface $object): void
    {
        $violations = $this->internalValidator->validate($object);
        $violationCount = $violations->count();

        if ($violationCount === 0) {
            return; // Every thing is ok
        }

        $exceptionMessage = 'Failed to validate.';
        foreach ($violations as $violation) {
            $exceptionMessage .= ' "' . $violation->getPropertyPath() . '" ' . $violation->getMessage();

            if ($violationCount > 1) {
                $exceptionMessage .= ' |';
            }

            $violationCount--;
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


    /**
     * Normalizes pagination
     */
    public function normalizePagination(PaginationData $paginationData): array
    {
        $this->validate($paginationData);

        return $this->internalSerializer->normalize($paginationData);
    }


    /**
     * Normalizes the filter
     */
    public function normalizeFilter(AbstractFilter $filter): array
    {
        $this->validate($filter);

        return $this->internalSerializer->normalize($filter);
    }
}
