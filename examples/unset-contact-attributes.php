<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';
const CONTACT_ATTRIBUTE_ID = '';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->contacts()->unsetContactAttributeValue(PHONE_NUMBER, [
        'contact_attribute_id' => CONTACT_ATTRIBUTE_ID,
    ]);


    if ($response->success) {
        print "Contact attributes successfully unset for: " . PHONE_NUMBER . " \n";
        var_dump($response->data);
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}