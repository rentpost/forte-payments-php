<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\Client;

use Rentpost\ForteApi\Exception\Request\AbstractRequestException;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;
use Rentpost\ForteApi\Test\UserSettings;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;

class DocumentTest extends AbstractIntegrationTest
{
    
    protected function getTestDocumentPath(): string
    {
        return __DIR__ . '/../test-document.png';
    }
    

    public function testCreate()
    {
        $client = $this->getForteClient();

        $documentResourceId = UserSettings::getApplicationIdForDocumentCreate();

        $document = new Model\Document();
        $document
            ->setResource('application')
            ->setResourceId($documentResourceId)
            ->setDescription('My Description ' . rand());

        $attachment = new Model\Attachment();
        $attachment
            ->setSource($this->getTestDocumentPath())
            ->setHttpFileName('test-document-' . rand() . '.png') // Note: if same file name is used to many times, forte API will complain
            ->setContentType('image/png');

        $returnedDocument = $client->useDocuments()->create($document, $attachment);

        $this->assertDocument($returnedDocument);

        return $returnedDocument->getDocumentId();
    }


    /**
     * @depends testCreate
     */
    public function testFindOne(Attribute\Id\DocumentId $documentId)
    {
        $client = $this->getForteClient();

        $client->useDocuments()->findOne($documentId);


        $returnedDocument = null;
        // Since the document we are attempting to get was only just inserted
        // It seems to take a few seconds for it to become available.
        // repeatly attempt to get it for a few seconds
        for ($attempt = 0; $attempt < 10; $attempt++) {
            try {
                $returnedDocument = $client->useDocuments()->findOne($documentId);
            } catch (AbstractRequestException $e) {
                // Ignore this exception as we want to attempt to this a few times.
            }

            if ($returnedDocument) {
                continue;
            }

            sleep(1);
        }

        $this->assertNotEmpty($returnedDocument, 'Attempted a few times to get document from API, it should have succeeded by now');
        $this->assertDocument($returnedDocument);
    }

    
    protected function assertDocument($document)
    {
        $this->assertInstanceOf(Model\Document::class, $document);
        $this->assertEquals(filesize($this->getTestDocumentPath()), $document->getSize());
    }
}
