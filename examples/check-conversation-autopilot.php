<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;

const API_KEY = ''; // the communiqate api key
const PHONE_NUMBER = '+31612345678'; //contacts phone number (E.164 format)

$communiqate = new ApiClient(API_KEY, );

try {
    $response = $communiqate->conversations()->checkAutopilot(PHONE_NUMBER);

    if ($response->success) {
        print "Autopilot is: " . ($response->data['enabled'] ? 'enabled' : 'disabled') . "\n";
    }
} catch (Exception $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getMessage());
}