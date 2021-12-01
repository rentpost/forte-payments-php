<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\ValidatingSerializer;

use Doctrine\Common\Annotations\AnnotationRegistry;
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

        AnnotationRegistry::registerLoader('class_exists');

        $validator = $builder->enableAnnotationMapping()->getValidator();

        return $validator;
    }
}
