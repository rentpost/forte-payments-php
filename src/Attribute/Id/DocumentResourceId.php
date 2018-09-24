<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

use Rentpost\ForteApi\Attribute\AbstractAttribute;
use Rentpost\ForteApi\Exception\ValidationException;

// WONTIFIX - this should prob be abstract, but at the moment the serializer is instanciating this
class DocumentResourceId extends AbstractId
{
    protected function getIdPrefix(): string
    {
        //WONTIFIX - the document resouce ID can be a Dispute or an Application ID.
        //Quick hacked at the moment, hard coding `app` here
        return 'app';
    }

    /**
     * WONTIFIX - this is prob needed but will need to be reafactored
     * WONTIFIX - need to create a custom ClassDiscriminatorResolverInterface or similar to slive this problem instead
     *
     * The API `document` endpoint accepts a `resource_id` which can either be
     * a `dispute` or a `application`. This will detect which one and deserialize
     * to the appropriate type
     *
     * @param mixed $value
     *
     * @return AbstractAttribute
     */
/*    public static function deserializeToObject($value): AbstractAttribute
    {
        if (strpos($value, 'app_') === 0) {
            return new ApplicationId($value);
        } elseif (strpos($value, 'dsp_') === 0) {
            return new DisputeId($value);
        } else {
            throw new ValidationException(
                'DocumentResourceId is expecting a either a `dispute_id` or a `application_id`'
            );
        }
    }*/

}
