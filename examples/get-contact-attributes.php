<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->contacts()->getContactAttributeValues(PHONE_NUMBER);


    if ($response->success) {
        print "Contacts for " . PHONE_NUMBER . ": \n";
        var_dump($response->data);
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}