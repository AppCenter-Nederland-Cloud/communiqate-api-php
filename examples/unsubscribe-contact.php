<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;

const API_KEY = '';

const PHONE_NUMBER = '+31612345678';

$communiqate = new ApiClient(API_KEY);

$response = $communiqate->contacts()->unsubscribeContact(PHONE_NUMBER);

if ($response->success) {
    print "Successfully unsubscribed the contact! \n";
}