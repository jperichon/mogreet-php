<?php

namespace Mogreet;

class System 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function ping(array $options = array()) 
    {
        return $this->client->processRequest('/moms/system.ping', $options);
    }
}

?>
