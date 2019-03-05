<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

/**
 * DocumentSubResource
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class DocumentSubResource extends AbstractSubResource
{

    /**
     * Creates/adds a document
     *
     * @note we use the reseller org id here since only resellers need to add documents
     *
     * @see https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#documents
     *
     * @param Model\Document $document
     * @param Model\Attachment $attachment
     */
    public function create(Model\Document $document, Model\Attachment $attachment): Model\Document
    {
        $uri = UriBuilder::build('organizations/%s/documents', [$this->getAuthOrgId()->getValue()]);

        return $this->getHttpClient()
            ->makeModelRequestWithAttachment('post', $uri, Model\Document::class, $document, $attachment);
    }


    /**
     * Finds a document
     *
     * @note we use the reseller org id here since only resellers use documents
     *
     * @param Attribute\Id\DocumentId $documentId
     *
     * @throws \Rentpost\ForteApi\Exception\LibraryFaultException
     */
    public function findOne(Attribute\Id\DocumentId $documentId): Model\Document
    {
        $uri = UriBuilder::build('organizations/%s/documents/%s', [
            $this->getAuthOrgId()->getValue(),
            $documentId->getValue(),
        ]);

        return $this->getHttpClient()
            ->makeModelRequest('get', $uri, Model\Document::class);
    }
}
