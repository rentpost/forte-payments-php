<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Attachment
 *
 * This class does not really map to the API like the other model classes do. This is here
 * to help construct requests to the create document endpoint.
 *
 * Its unlikely anything will deserialize into this model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Attachment extends AbstractModel
{

    /**
     * Any value which can be accepted by `file_get_contents()`
     *
     * @var string
     * @Assert\NotBlank()
     */
    protected $source;

    /**
     * Any file name you like including the extension. This will be used as the `filename`
     * parameter in the multipart http request. Try and keep the extension consistent with
     * the `contentType`
     *
     * @var string
     * @Assert\NotBlank()
     */
    protected $httpFileName;

    /**
     * Mime type of the upload, eg `image/jpeg`
     *
     * @var string
     * @Assert\NotBlank()
     */
    protected $contentType;


    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }


    /**
     * @param string $source
     *
     * @return self
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }


    /**
     * @return string
     */
    public function getHttpFileName(): string
    {
        return $this->httpFileName;
    }


    /**
     * @param string $httpFileName
     *
     * @return self
     */
    public function setHttpFileName(string $httpFileName): self
    {
        $this->httpFileName = $httpFileName;

        return $this;
    }


    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }


    /**
     * @param string $contentType
     *
     * @return self
     */
    public function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }



}
