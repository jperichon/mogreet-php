<?php

class Mogreet_Keyword 
{
    private $client;

    public function __construct(Mogreet $client)
    {
        $this->client = $client;
    }

    public function listAll(array $params = array()) 
    {
        return $this->client->processRequest('cm', 'keyword.list', $params);
    }

    public function check(array $params = array())
    {
        return $this->client->processRequest('cm', 'keyword.check', $params);
    } 

    public function add(array $params = array())
    {
        return $this->client->processRequest('cm', 'keyword.add', $params);
    } 

    public function remove(array $params = array())
    {
        return $this->client->processRequest('cm', 'keyword.remove', $params);
    } 

}

?>
