<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\Date;
use Rentpost\ForteApi\Attribute\Id\DocumentId;
use Rentpost\ForteApi\Attribute\Id\DocumentResourceId;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Document model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Document extends AbstractModel
{

    protected ?DocumentId $documentId = null;

    #[Assert\NotBlank]
    #[Assert\Choice(['dispute', 'application'])]
    protected ?string $resource = null;

    #[Assert\NotBlank]
    protected ?DocumentResourceId $resourceId = null;

    #[Assert\NotBlank]
    protected ?string $description = null;

    /**
     * 10MB limit, using 1000 calculation instead of 1024 to be careful
     */
    #[Assert\LessThanOrEqual(10_000_000)]
    protected ?int $size = null;
    protected ?Date $receivedDate = null;
    protected ?string $file = null;


    public function getDocumentId(): ?DocumentId
    {
        return $this->documentId;
    }


    public function setDocumentId(DocumentId $documentId): self
    {
        $this->documentId = $documentId;

        return $this;
    }


    public function getResource(): string
    {
        return $this->resource;
    }


    public function setResource(string $resource): self
    {
        $this->resource = $resource;

        return $this;
    }


    public function getResourceId(): DocumentResourceId
    {
        return $this->resourceId;
    }


    public function setResourceId(DocumentResourceId $resourceId): self
    {
        $this->resourceId = $resourceId;

        return $this;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getSize(): ?int
    {
        return $this->size;
    }


    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }


    public function getReceivedDate(): ?Date
    {
        return $this->receivedDate;
    }


    public function setReceivedDate(Date $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    public function getFile(): ?string
    {
        return $this->file;
    }


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
