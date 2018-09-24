<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Serializer;

use Rentpost\ForteApi\Serializer\ForteNormalizer\ForteObjectNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @author Sam Anthony <sam@rentpost.com>
 */
class Factory
{
    
    /**
     * This will typically serializer `AbstractModel` and `AbstractAttribute`
     *
     * Make instance of Symfony serializer. The Serializer is setup
     * to read PHP7 type hints from `getters`, `setters`, `adders` etc
     * to determine which classes to deserialize JSON to.
     *
     * @return Serializer
     */
    public function make(): Serializer
    {
        $extractor = new ReflectionExtractor();

        $customNormalizer = new CustomNormalizer();

        $nameConverter = $this->makeNameConverter();

        $arrayDenormalizer = new ArrayDenormalizer(); // Seems to help respect the 'adder' typehints in the model. eg `addEmployee(Employee $employee)`

        $objectNormalizer = new ForteObjectNormalizer(
            null,
            $nameConverter,
            null,
            $extractor
        );

        $encoder = new JsonEncoder();

        $serializer = new Serializer(
            [
                $customNormalizer,
                $objectNormalizer,
                $arrayDenormalizer,
            ],
            [$encoder]
        );

        return $serializer;
    }


    /**
     * @return NameConverterInterface
     */
    protected function makeNameConverter(): NameConverterInterface
    {
        $nameConverter = new AmendableCamelCaseToSnakeCaseNameConverter();

        // Note: Some of Forte parameter names could not be converted by the default `CamelCaseToSnakeCaseNameConverter`
        // hence a few amendments/exceptions have been hard coded here. Also forte was not 100% consistent with attribute
        // naming convention, eg `last4_ssn` and `last_4_account_number`
        $nameConverter->addAmendment('last4AccountNumber', 'last_4_account_number');
        $nameConverter->addAmendment('owner1', 'owner');
        $nameConverter->addAmendment('owner2', 'owner_2');
        $nameConverter->addAmendment('owner3', 'owner_3');
        $nameConverter->addAmendment('owner4', 'owner_4');

        return $nameConverter;
    }
}
