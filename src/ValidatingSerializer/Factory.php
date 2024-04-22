<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\ValidatingSerializer;

use Rentpost\ForteApi\Serializer\Factory as SerializerFactory;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EmailValidator;
use Symfony\Component\Validator\ConstraintValidatorFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Factory
{

    public function make(): ValidatingSerializer
    {
        $validator = $this->makeValidator();
        $serializer = (new SerializerFactory)->make();

        $validatingSerializer = new ValidatingSerializer($serializer, $validator);

        return $validatingSerializer;
    }


    protected function makeValidator(): ValidatorInterface
    {
        return Validation::createValidatorBuilder()
            ->setConstraintValidatorFactory(
                new ConstraintValidatorFactory([
                    EmailValidator::class => new EmailValidator(Email::VALIDATION_MODE_HTML5),
                ])
            )
            ->enableAttributeMapping(true)->getValidator();
    }
}
