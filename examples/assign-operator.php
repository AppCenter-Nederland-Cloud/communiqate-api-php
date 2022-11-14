<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';
const OPERATOR_ID = '';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->conversations()->assignOperator(PHONE_NUMBER, [
        'operator_id' => OPERATOR_ID
    ]);

    if ($response->success) {
        print "Operator with id: ". OPERATOR_ID ." assigned to:". PHONE_NUMBER ." \n";
        var_dump($response->data);
    }
} catch (Exception $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getTraceAsString());
}