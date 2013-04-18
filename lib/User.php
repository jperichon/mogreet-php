<?php

namespace Mogreet;

class User 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function transactions($number, array $options = array()) 
    {
        $options['number'] = $number;
        return $this->client->processRequest('/moms/user.transactions', $options);
    }

    public function getopt($number, array $options = array()) 
    {
        $options['number'] = $number;
        return $this->client->processRequest('/moms/user.getopt', $options);
    }

    public function info($number, array $options = array()) 
    {
        $options['number'] = $number;
        return $this->client->processRequest('/moms/user.info', $options);
    }

    public function lookup($number, array $options = array()) 
    {
        $options['number'] = $number;
        return $this->client->processRequest('/moms/user.lookup', $options);
    }

    public function uncache($number, array $options = array()) 
    {
        $options['number'] = $number;
        return $this->client->processRequest('/moms/user.uncache', $options);
    }
}

?>
