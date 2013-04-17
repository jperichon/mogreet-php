## Introduction

This is a PHP wrapper for the Mogreet API, stil under development.
Only a few methods are implemented so far. You can:
- ping our service (system.ping)
- send a SMS/MMS (transaction.send)
- upload a media (media.upload)

The rest is coming soon, with tests and solutions to install using a package manager.

## Installation

For now, you can use **mogreet-php** only by checking out this repo.
Others methods will be added once the development will be done.

    git clone https://github.com/jperichon/mogreet-php.git
    
    require '/path/to/mogreet-php/Client.php';

## Usage examples

### Send an SMS

```php
<?php

require('/path/to/mogreet-php/Client.php');

$client_id = "xxxxx" // Your Client ID from https://developer.mogreet.com/dashboard
$token = "xxxxx" // Your token from https://developer.mogreet.com/dashboard
$campaign_id = "xxxxx" // Your campaign_id from https://developer.mogreet.com/dashboard
$client = new Mogreet\Client($client_id, $token);
$response = $client->transaction->send($campaign_id, "9999999999", "This is super easy!");
print $response->message_id;

?>

```

## [Full Documentation](https://developer.mogreet.com/docs)

The full documentation for the Mogreet API is available [here](https://developer.mogreet.com/docs)

## Prerequisites

* PHP >= 5.2.3
* The PHP JSON extension
