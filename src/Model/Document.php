<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

class Document extends AbstractModel
{
    /**
     * @var Attribute\Id\DocumentId
     */
    protected $documentId;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"dispute", "application"})
     */
    protected $resource;

    /**
     * @var Attribute\Id\DocumentResourceId
     * @Assert\NotBlank()
     */
    protected $resourceId;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var Attribute\Date
     */
    protected $receivedDate;

    /**
     * @var string
     */
    protected $file;

    /**
     * @return null|Attribute\Id\DocumentId
     */
    public function getDocumentId(): ?Attribute\Id\DocumentId
    {
        return $this->documentId;
    }


    /**
     * @param Attribute\Id\DocumentId $documentId
     *
     * @return self
     */
    public function setDocumentId(Attribute\Id\DocumentId $documentId): self
    {
        $this->documentId = $documentId;

        return $this;
    }


    public function getResource(): string
    {
        return $this->resource;
    }


    public function setResource($resource): self
    {
        $this->resource = $resource;

        return $this;
    }


    public function getResourceId(): Attribute\Id\DocumentResourceId
    {
        return $this->resourceId;
    }


    public function setResourceId(Attribute\Id\DocumentResourceId $resourceId): self
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


    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }


    /**
     * @param int $size
     *
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }


    /**
     * @return Attribute\Date|null
     */
    public function getReceivedDate(): ?Attribute\Date
    {
        return $this->receivedDate;
    }


    /**
     * @param Attribute\Date $receivedDate
     *
     * @return self
     */
    public function setReceivedDate(Attribute\Date $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }


    /**
     * @param string $file
     *
     * @return self
     */
    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }




    static public function getMimeTypes()
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
