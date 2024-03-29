<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Exception\LibraryUsageException;
use Rentpost\ForteApi\Exception\Request\AbstractRequestException;
use Rentpost\ForteApi\Exception\Request\TimeoutException;
use Rentpost\ForteApi\Filter\TransactionFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

/**
 * Methods for transactions
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 * @author Sam Anthony <sam@rentpost.com>
 */
class TransactionSubResource extends AbstractSubResource
{

    /**
     * Creates a new transaction
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function create(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Model\Transaction $transaction
    ): Model\Transaction
    {
        $uri = UriBuilder::build('organizations/%s/locations/%s/transactions/', [
            $organizationId->getValue(),
            $locationId->getValue(),
        ]);

        return $this->getHttpClient()
            ->makeModelRequest('post', $uri, Model\Transaction::class, $transaction);
    }


    /**
     * Updates an existing transaction
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function update(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Model\Transaction $transaction
    ): Model\Transaction
    {
        $uri = UriBuilder::build('organizations/%s/locations/%s/transactions/', [
            $organizationId->getValue(),
            $locationId->getValue(),
        ]);

        return $this->getHttpClient()
            ->makeModelRequest('put', $uri, Model\Transaction::class, $transaction);
    }


    /**
     * Finds a single transaction
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function findOne(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Attribute\Id\TransactionId $transactionId
    ): Model\Transaction
    {
        $uri = UriBuilder::build('organizations/%s/locations/%s/transactions/%s', [
            $organizationId->getValue(),
            $locationId->getValue(),
            $transactionId->getValue(),
        ]);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\Transaction::class);
    }


    /**
     * When anything is just inserted (POST) into Forte, it can take several
     * seconds to become available. This will wait and retry a few times until it becomes available
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function findOneWait(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Attribute\Id\TransactionId $transactionId
    ): ?Model\Transaction
    {
        // Make sure that PHP does not timeout during the execution of this function since we
        // must continue making attempts due to persistance issues on Forte's end
        // Note that the request itself has a retry built into it as well which could end up taking
        // a full 8-10 seconds to cycle through the 3 attempts
        \set_time_limit(200); // 3 minutes should be enough time to fully cycle

        $transaction = null;
        // If the transaction we are attempting to get was only just POSTed
        // It seems to take a few seconds for it to become available.
        // repeatly attempt to get it for a few seconds
        $attempt = 1;
        while (true) {
            try {
                $transaction = $this->findOne($organizationId, $locationId, $transactionId);
            } catch (AbstractRequestException | NotEncodableValueException $e) {
                // Ignore the exception the first 10 times because we are waiting for it to become available
                // It seems we're getting back an HTML response with a 403 error in some cases.  This
                // appears to be some kind of Forte issue.  The specific transaction in question which
                // is returning a 403, is reachable and discoverable after the fact, so it appears to
                // possibly be timing related and a race condition.
                if ($attempt === 5) {
                    throw new TimeoutException(
                        "Retried 5 times. Either the transaction id, '{$transactionId->getValue()}',
                        is invalid or not yet available.  Or possibly we're getting a response that
                        cannot be properly decoded as JSON.",
                        $e,
                    );
                }
            }

            if ($transaction) {
                return $transaction;
            }

            sleep(12);
            $attempt++;
        }

        // Execution will never reach here
    }


    /**
     * Finds all transactions
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function find(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        TransactionFilter $filter, // Unlike most other find() methods, this one requires filter.
        ?PaginationData $pagination = null
    ): Model\TransactionCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/locations/%s/transactions',
            [
                $organizationId->getValue(),
                $locationId->getValue(),
            ],
            $filter,
            $pagination,
        );

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\TransactionCollection::class);
    }


    /**
     * Does not include the organization id or location id in the URI.
     * This is not a documented endpoint. It appears to return all transactions
     * relating to the authenticated Organization.
     *
     * @param TransactionFilter $filter         Unlike most other find() methods, this one requires filter
     */
    public function findForEntireOrganization(
        TransactionFilter $filter,
        ?PaginationData $pagination = null
    ): Model\TransactionCollection
    {
        $uri = UriBuilder::build('transactions/', [], $filter, $pagination);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\TransactionCollection::class);
    }


    /**
     * @param Attribute\Id\OrganizationId $organizationId   Use reseller org id if reseller
     * @param Model\Transaction $transactionBeenVoided      Note, only the transactionId and
     *                                                      authorizationCode need to be set for voiding
     */
    public function void(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Model\Transaction $transactionBeenVoided
    ): Model\Transaction
    {
        if (!$transactionBeenVoided->getTransactionId()
            || !$transactionBeenVoided->getAuthorizationCode()
        ) {
            throw new LibraryUsageException(
                'To void a transaction, the transaction object needs to have a transactoinId and authoizationCode set',
            );
        }

        /**
         * Need to create a new instance of Tranaction for the following reasons
         * - we dont want to modify the object passed in
         * - forte is only expecting a few parameters, passing in all of them makes it complain.
         */
        $transactionCopy = new Model\Transaction();
        $transactionCopy
            ->setTransactionId($transactionBeenVoided->getTransactionId())
            ->setAuthorizationCode($transactionBeenVoided->getAuthorizationCode())
            ->setAction('void');

        $uri = UriBuilder::build('organizations/%s/locations/%s/transactions/%s', [
            $organizationId->getValue(),
            $locationId->getValue(),
            $transactionCopy->getTransactionId()->getValue(),
        ]);

        return $this->getHttpClient()
            ->makeModelRequest('put', $uri, Model\Transaction::class, $transactionCopy);
    }


    /**
     * Forte has a requirement that you pass a "authorization_code" when voiding.
     * If you do not have this authorization_code stored, then use this method,
     * It first first make a call to the API to get the authorization_code and
     * then make another call to void.
     *
     * @param Attribute\Id\OrganizationId $organizationId           Use reseller org id if reseller
     */
    public function voidFromTransactionId(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Attribute\Id\TransactionId $transactionIdBeenVoided
    ): Model\Transaction
    {
        $transaction = $this->findOne(
            $organizationId,
            $locationId,
            $transactionIdBeenVoided,
        );

        return $this->void(
            $organizationId,
            $locationId,
            $transaction,
        );
    }
}
