<?php

class Mogreet_System
{
    private $client;

    public function __construct(Mogreet $client)
    {
        $this->client = $client;
    }

    public function ping(array $params = array())
    {
        return $this->client->processRequest('moms', 'system.ping', $params);
    }
}
