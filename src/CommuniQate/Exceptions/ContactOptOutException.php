<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

/**
 * This exception is usually thrown when a template message is being sent to a user that has opted out for marketing communications.
 */
class ContactOptOutException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, $responseObject->message);
    }

}