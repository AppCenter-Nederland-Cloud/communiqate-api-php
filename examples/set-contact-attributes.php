<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';
const ATTRIBUTE_ID = 'example_id';
const ATTRIBUTE_VALUE = 'true';


$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->contacts()->setContactAttributeValue(PHONE_NUMBER, [
        'contact_attribute_id' => ATTRIBUTE_ID,
        'value' => ATTRIBUTE_VALUE
    ]);


    if ($response->success) {
        print "Contact attributes successfully set for: " . PHONE_NUMBER . " \n";
        var_dump($response->data);
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}