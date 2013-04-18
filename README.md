## Introduction

This is a PHP wrapper for the Mogreet API.
Tests and a solution to install the wrapper using a package manager are coming soon.

## Installation

For now, you can use **mogreet-php** only by checking out this repo.
Others methods will be added later.

First clone the git repo:

    git clone https://github.com/jperichon/mogreet-php.git
    
Then include the Client:
    
    require('/path/to/mogreet-php/Client.php');

## Notes

Due to the keyword restriction on 'list' and the existing function 'empty()' in
PHP, I changed the mapping for the following API call:

- $client->usersList->* maps the methods of the List APIs.
- $client->*->listAll maps to the method list.
- $client->usersList->pruneAll maps to 'list.empty'

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

### Send an MMS to one recipient

```php

$campaign_id = "xxxxx" // Your campaign_id from https://developer.mogreet.com/dashboard
$response = $client->transaction->send($campaign_id, "9999999999", "This is super easy!",
    array("content_url" => 'https://wp-uploads.mogreet.com/wp-uploads/2013/02/API-Beer-sticker-300dpi-1024x1024.jpg')
);

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

### Upload a media from an online file

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

* PHP >= 5.3
* The PHP JSON extension
