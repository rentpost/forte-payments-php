<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\ValidatingSerializer;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Factory
{

    public function make(): ValidatingSerializer
    {
        $validator = $this->makeValidator();
        $serializer = (new \Rentpost\ForteApi\Serializer\Factory())->make();

        $validatingSerializer = new ValidatingSerializer($serializer, $validator);

        return $validatingSerializer;
    }


    protected function makeValidator(): ValidatorInterface
    {
        $builder = Validation::createValidatorBuilder();
        $validator = $builder->enableAnnotationMapping(true)->getValidator();

        return $validator;
    }
}
