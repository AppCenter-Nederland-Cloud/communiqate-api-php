<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->conversations()->assignOperator(PHONE_NUMBER, [
        'operator_id' => null
    ]);

    if ($response->success) {
        print "Operator removed for contact with phone number: " . PHONE_NUMBER . " \n";
        var_dump($response->data);
    }
} catch (Exception $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getTraceAsString());
}