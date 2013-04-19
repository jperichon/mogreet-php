## Introduction

This is a PHP wrapper for the Mogreet API.
Tests and a solution to install the wrapper using a package manager are coming soon.

## Installation

For now, you can use **mogreet-php** only by checking out this repo.
Others methods will be added later.

First clone the git repo:
    
    git clone https://github.com/jperichon/mogreet-php.git
    
Then include the Client:
```php 
require_once('/path/to/mogreet-php/Mogreet.php');
```

## Usage examples

### Create a client

```php

require_once('/path/to/mogreet-php/Mogreet.php');

$clientId = 'xxxxx' // Your Client ID from https://developer.mogreet.com/dashboard
$token = 'xxxxx' // Your token from https://developer.mogreet.com/dashboard
$client = new Mogreet($clientId, $token);
```

### Ping

```php

$response = $client->system->ping();
print $response->message;
```

### Send an SMS to one recipient

```php

$response = $client->transaction->send(array(
    'campaign_id' => 'xxxxx', // Your SMS campaign ID from https://developer.mogreet.com/dashboard
    'to' => '9999999999',
    'message' => 'This is super easy!'
));
print $response->messageId;
```

### Send an MMS to one recipient

```php

$response = $client->transaction->send(array(
    'campaign_id' => 'xxxxx', // Your MMS campaign ID from https://developer.mogreet.com/dashboard
    'to' => '9999999999',
    'message' => 'This is super easy!',
    'content_url' => 'https://wp-uploads.mogreet.com/wp-uploads/2013/02/API-Beer-sticker-300dpi-1024x1024.jpg'
));
print $response->messageId;
```
### Upload a media file

```php

$response = $client->media->upload(array(
    'type' => 'image',
    'name' => 'mogreet logo',
    'file' => '/path/to/image/mogreet.png',
    // to ingest a file already online, use: 'url' => 'https://wp-uploads.mogreet.com/wp-uploads/2013/02/API-Beer-sticker-300dpi-1024x1024.jpg'
));
print $response->media->smartUrl;
print '<br/>';
print $response->media->contentId;
```

### List all medias

```php

$response = $client->media->listAll();
foreach($response->mediaList as $media) {
    print $media->contentId . ' => ' . $media->name . ' ' . $media->smartUrl . '<br />';
}
```

## Notes

With the Response object, you can print the plain JSON response of the API
call (print $response), or access directly a field (e.g: $response->message).

Due to the keyword restriction on 'list' and the existing function 'empty()' in
PHP, I changed the mappings of the following API calls:

- $client->*->listAll() maps to the method list
- $client->list->pruneAll() maps to 'list.empty'


## [Full Documentation](https://developer.mogreet.com/docs)

The full documentation for the Mogreet API is available [here](https://developer.mogreet.com/docs)

## Prerequisites

* PHP >= 5.2
* The PHP JSON extension
