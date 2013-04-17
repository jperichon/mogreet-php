## Introduction

This is a PHP wrapper for the Mogreet API.
Only a few methods are implemented so far. You can:
- ping our service (system.ping)
- send a SMS/MMS (transaction.send)
- upload a media (media.upload)

The rest is coming soon, with tests and solutions to install using a package manager.

## Installation

For now, you can use **mogreet-php** only by checking out this repo.
Others methods will be added once the development will be done.

First clone the git repo:

    git clone https://github.com/jperichon/mogreet-php.git
    
Then include the Client:
    
    require '/path/to/mogreet-php/Client.php';

## Usage examples

### Create a client

```php

require('/path/to/mogreet-php/Client.php');

$client_id = "xxxxx" // Your Client ID from https://developer.mogreet.com/dashboard
$token = "xxxxx" // Your token from https://developer.mogreet.com/dashboard
$client = new Mogreet\Client($client_id, $token);
```

### Ping

```php

$response = $client->system->ping();
print $response->message;
```

### Send an SMS to one recipient

```php

$campaign_id = "xxxxx" // Your campaign_id from https://developer.mogreet.com/dashboard
$response = $client->transaction->send($campaign_id, "9999999999", "This is super easy!");
print $response->message_id;
```

### Upload a media from a local file

```php

$response = $client->media->upload(
    'image', 
    'mogreet logo',
    array("file" => '/path/to/image/mogreet.png')
);
print $response->toString();
```

### Upload a media from a file online

```php

$response = $client->media->upload(
    'image', 
    'mogreet dev logo',
    array("url" => 'https://wp-uploads.mogreet.com/wp-uploads/2013/02/API-Beer-sticker-300dpi-1024x1024.jpg')
);
print $response->toString();
```

## [Full Documentation](https://developer.mogreet.com/docs)

The full documentation for the Mogreet API is available [here](https://developer.mogreet.com/docs)

## Prerequisites

* PHP >= 5.2.3
* The PHP JSON extension
