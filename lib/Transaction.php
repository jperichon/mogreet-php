<?php

namespace Mogreet;

class Transaction 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send($campaign_id, $to, $message, array $options = array()) 
    {
        $params = [ "campaign_id" => $campaign_id, "to" => $to, "message" => $message ];
        $params = array_merge($options, $params);
        return $this->client->processRequest('/moms/transaction.send', $params);
    }
}

?>
