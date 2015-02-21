<?php

class Mogreet_Transaction
{
    protected $client;

    public function __construct(Mogreet $client)
    {
        $this->client = $client;
    }

    public function send(array $params = array())
    {
        return $this->client->processRequest('moms', 'transaction.send', $params);
    }

    public function lookup(array $params = array())
    {
        return $this->client->processRequest('moms', 'transaction.lookup', $params);
    }
}
