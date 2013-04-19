<?php

class Mogreet_Media 
{
    private $client;

    public function __construct(Mogreet $client)
    {
        $this->client = $client;
    }

    public function remove($contentId, array $params = array()) 
    {
        return $this->client->processRequest('cm', 'media.remove', $params);
    }

    public function listAll(array $params = array())
    {
        return $this->client->processRequest('cm', 'media.list', $params);
    }

    public function upload(array $params = array()) 
    {
        if (isset($params['file'])) {
            // uploading a file located on the server
            $path = $params['file'];
            // TODO change way to detect the mime type of the file
            $content_type = mime_content_type($path);
            $params['file'] = "@${path};type=${content_type}";
        }
        return $this->client->processRequest('cm', 'media.upload', $params, true);
    }
}

?>
