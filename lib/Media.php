<?php

namespace Mogreet;

class Media 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function remove($contentId, array $options = array()) 
    {
        $options['content_id'] = $contentId;
        return $this->client->processRequest('/cm/media.remove', $options);
    }

    public function listAll(array $options = array())
    {
        return $this->client->processRequest('/cm/media.list', $options);
    }

    public function upload($type, $name, array $options = array()) 
    {
        $options['type'] = $type;
        $options['name'] = $name;
        if (isset($options['file'])) {
            // uploading a file located on the server
            $path = $options['file'];
            // TODO change way to detect the mime type of the file
            $content_type = mime_content_type($path);
            $options['file'] = "@${path};type=${content_type}";
        }
        return $this->client->processRequest('/cm/media.upload', $options, true);
    }
}

?>
