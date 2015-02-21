<?php

class Mogreet_User
{
    private $client;

    public function __construct(Mogreet $client)
    {
        $this->client = $client;
    }

    public function transactions(array $params = array())
    {
        return $this->client->processRequest('moms', 'user.transactions', $params);
    }

    public function getopt(array $params = array())
    {
        return $this->client->processRequest('moms', 'user.getopt', $params);
    }

    public function info(array $params = array())
    {
        return $this->client->processRequest('moms', 'user.info', $params);
    }

    public function lookup(array $params = array())
    {
        return $this->client->processRequest('moms', 'user.lookup', $params);
    }

    public function uncache(array $params = array())
    {
        return $this->client->processRequest('moms', 'user.uncache', $params);
    }
}
