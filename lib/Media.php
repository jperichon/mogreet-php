<?php

namespace Mogreet;

class Media 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function upload($type, $name, array $options = array()) 
    {
        $params = [ "type" => $type, "name" => $name ];
        $params = array_merge($options, $params);
        if (isset($params['file'])) {
            // uploading a file located on the server
            $path = $params['file'];
            // TODO change way to detect the mime type of the file
            $content_type = mime_content_type($path);
            $params['file'] = "@${path};type=${content_type}";
        }
        return $this->client->processRequest('/cm/media.upload', $params, true);
    }
}

?>
