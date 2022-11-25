# CommuniQate API Library for PHP
___

This is the PHP api library for CommuniQate.

This library can be used to:

* Check, enable and disable the autopilot.
* Create, update and delete planned messages.
* Get, set and un-set contact attributes.
* Update the unsubscribe value on the contact (opt-out from all messages).
* Assign or de-assign an operator to the conversation.
* Get, set and un-set contact attributes.
* Get, and update contact information.

Examples can be found in the <code>[examples/](/communiqate-api-php/tree/main/examples)</code> directory or in the [Examples](#examples) section below.
### Installation
___
You can use composer to install the library, this is the preferred method of installation.

Execute the following command in your projects root directory:

<code>composer require acn-cloud/communiqate-api-php</code>


### Examples
___
See the <code>[examples/](/communiqate-api-php/tree/main/examples)</code> directory for examples of the features listed above.
### Basic Example

```php
<?php

use CommuniQate\ApiClient;

const API_KEY = 'YOUR_COMMUNIQATE_API_KEY'; // the communiqate api key
const PHONE_NUMBER = '+31612345678'; //contacts phone number (E.164 format)

$communiqate = new ApiClient(API_KEY);

$response = $communiqate->conversations()->checkAutopilot(PHONE_NUMBER);

if ($response->success) {
    print "Autopilot is: " . ($response->data['enabled'] ? 'enabled' : 'disabled') . "\n";
}
```
This is the check autopilot example, it can be found in <code>[examples/check-conversation-autopilot.php](/communiqate-api-php/blob/main/examples/check-conversation-autopilot.php)</code>. It can be used to check if the communiqate autopilot is enabled or disabled.
