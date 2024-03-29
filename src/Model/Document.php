<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Document model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Document extends AbstractModel
{

    protected ?Attribute\Id\DocumentId $documentId = null;

    #[Assert\NotBlank]
    #[Assert\Choice(['dispute', 'application'])]
    protected ?string $resource = null;

    #[Assert\NotBlank]
    protected ?Attribute\Id\DocumentResourceId $resourceId = null;

    #[Assert\NotBlank]
    protected ?string $description = null;

    /**
     * 10MB limit, using 1000 calculation instead of 1024 to be careful
     */
    #[Assert\LessThanOrEqual(10000000)]
    protected ?int $size = null;
    protected ?Attribute\Date $receivedDate = null;
    protected ?string $file = null;


    /**
     * Gets the Document id
     */
    public function getDocumentId(): ?Attribute\Id\DocumentId
    {
        return $this->documentId;
    }


    /**
     * Sets the Document id
     *
     * @param Attribute\Id\DocumentId $documentId
     */
    public function setDocumentId(Attribute\Id\DocumentId $documentId): self
    {
        $this->documentId = $documentId;

        return $this;
    }


    /**
     * Gets the resource
     */
    public function getResource(): string
    {
        return $this->resource;
    }


    /**
     * Sets the resource
     *
     * @param string $resource
     */
    public function setResource(string $resource): self
    {
        $this->resource = $resource;

        return $this;
    }


    /**
     * Gets the Resource id
     */
    public function getResourceId(): Attribute\Id\DocumentResourceId
    {
        return $this->resourceId;
    }


    /**
     * Sets the Resource id
     *
     * @param Attribute\Id\DocumentResourceId $resourceId
     */
    public function setResourceId(Attribute\Id\DocumentResourceId $resourceId): self
    {
        $this->resourceId = $resourceId;

        return $this;
    }


    /**
     * Gets the description
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /**
     * Sets the description
     *
     * @param string $description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    /**
     * Gets the size in bytes
     */
    public function getSize(): ?int
    {
        return $this->size;
    }


    /**
     * Sets the size in bytes
     *
     * @param int $size
     */
    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }


    /**
     * Gets the date received
     */
    public function getReceivedDate(): ?Attribute\Date
    {
        return $this->receivedDate;
    }


    /**
     * Sets the date received
     *
     * @param Attribute\Date $receivedDate
     */
    public function setReceivedDate(Attribute\Date $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    /**
     * Gets the file path
     */
    public function getFile(): ?string
    {
        return $this->file;
    }


    /**
     * Sets the file path
     *
     * @param string $file
     */
    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }


    /**
     * Gets the mime types that are allowed
     *
     * @return string[]
     */
    public static function getMimeTypes(): array
    {
        return [
            'image/jpeg',
            'image/png',
            'image/tiff',
            'text/plain',
            'image/bmp',
            'application/pdf',
        ];
    }
}
