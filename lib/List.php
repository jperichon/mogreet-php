<?php

class Mogreet_List 
{
    private $client;

    public function __construct(Mogreet $client)
    {
        $this->client = $client;
    }

    public function destroy(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.destroy', $params);
    }

    public function pruneAll(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.empty', $params);
    }

    public function download(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.download', $params);
    }

    public function send(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.send', $params);
    }

    public function prune(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.prune', $params);
    }

    public function append(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.append', $params);
    }

    public function create(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.create', $params);
    }

    public function listAll(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.list', $params);
    }

    public function info(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'list.info', $params);
    }
}

?>
