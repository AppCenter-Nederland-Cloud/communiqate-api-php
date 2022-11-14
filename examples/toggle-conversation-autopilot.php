<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';

$communiqate = new ApiClient(API_KEY);

$response = $communiqate->conversations()->toggleAutoPilot(PHONE_NUMBER, ['enabled' => false]);

if ($response->success) {
    $response = $communiqate->conversations()->checkAutopilot(PHONE_NUMBER);
    print "Autopilot is: " . ($response->data['enabled'] ? 'enabled' : 'disabled') . "\n";
}