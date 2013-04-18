<?php

namespace Mogreet;

class Transaction 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send($campaignId, $to, $message, array $options = array()) 
    {
        $options['campaign_id'] = $campaignId;
        $options['to'] = $to;
        $options['message'] = $message;
        return $this->client->processRequest('/moms/transaction.send', $options);
    }

    public function lookup($messageId, $hash, array $options = array())
    {
        $options['message_id'] = $messageId;
        $options['hash'] = $hash;
        return $this->client->processRequest('/moms/transaction.lookup', $options);
    } 
}

?>
