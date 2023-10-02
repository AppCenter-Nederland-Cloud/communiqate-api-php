<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

/**
 * This exception is usually thrown when a template message is being sent and the phone number is not a valid e164 format.
 */
class InvalidPhoneException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, $responseObject->message);
    }

}