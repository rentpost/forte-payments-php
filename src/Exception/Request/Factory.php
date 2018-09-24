<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Exception\Request;

use Rentpost\ForteApi\Model;

/**
 * When Forte returns a bad HTTP code, eg 4xx or 5xx  level response codes
 * then we will try to throw a more specific exception if possible
 *
 * For example, if a Transaction fails because payment details are invalid, then we should
 * return an exception specific to that. But if a request fails for other unknown reasons,
 * such as showhow malfomred JSON was sent to forte or other unknown problem, when just throw
 * a more generic Request Exception.
 *
 * This factory will attempt to return the most suitable exception
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Factory
{

    /**
     * Factory make
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param Model\AbstractModel $model
     */
    public static function make(
        \Psr\Http\Message\ResponseInterface $response,
        Model\AbstractModel $model
    ): AbstractRequestException
    {
        switch (true) {
            case ($response->getStatusCode() >= 400 && $response->getStatusCode() < 500):
                return new TransactionException($response, $model);
            case $response->getStatusCode() >= 500:
                return new ServerErrorException($response, $model);
        }

        $responseObject = $model->getResponse();
        if (!$responseObject) {
            return new UnknownException($response, $model);
        }

        if ($model instanceof Model\Transaction) {
            if ($responseObject->getResponseCode()) {
                if (preg_match('~^U[0-9]{2}$~', $responseObject->getResponseCode())) {
                    return new TransactionException($response, $model);
                }
            }
        }

        return new UnknownException($response, $model);
    }
}
