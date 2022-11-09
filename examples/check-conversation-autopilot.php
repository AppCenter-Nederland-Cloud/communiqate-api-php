<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;

const API_KEY = '';

$communiqate = new ApiClient(API_KEY);

$response = $communiqate->conversations()->checkAutopilot('+31612345678');

if ($response->success) {
    print "Autopilot is: " . ($response->data['enabled'] ? 'enabled' : 'disabled') . "\n";
}