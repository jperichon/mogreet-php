<?php

namespace Mogreet;

class UsersList 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function destroy($listId, $name, array $options = array()) 
    {
        $options['list_id'] = $listId;
        $options['name'] = $name;
        return $this->client->processRequest('/cm/list.destroy', $options);
    }

    public function pruneAll($listId, $name, array $options = array()) 
    {
        $options['list_id'] = $listId;
        $options['name'] = $name;
        return $this->client->processRequest('/cm/list.prune', $options);
    }

    public function download($listId, array $options = array()) 
    {
        $options['list_id'] = $listId;
        return $this->client->processRequest('/cm/list.download', $options);
    }

    public function send($listId, $campaignId, $message, array $options = array()) 
    {
        $options['list_id'] = $listId;
        $options['campaign_id'] = $campaignId;
        $options['message'] = $message;
        return $this->client->processRequest('/cm/list.send', $options);
    }

    public function prune($listId, $numbers, array $options = array()) 
    {
        $options['list_id'] = $listId;
        $options['numbers'] = $numbers;
        return $this->client->processRequest('/cm/list.prune', $options);
    }

    public function append($listId, $numbers, array $options = array()) 
    {
        $options['list_id'] = $listId;
        $options['numbers'] = $numbers;
        return $this->client->processRequest('/cm/list.append', $options);
    }

    public function create($name, array $options = array()) 
    {
        $options['name'] = $name;
        return $this->client->processRequest('/cm/list.create', $options);
    }

    public function listAll(array $options = array()) 
    {
        return $this->client->processRequest('/cm/list.list', $options);
    }

    public function info($listId, array $options = array()) 
    {
        $options['list_id'] = $listId;
        return $this->client->processRequest('/cm/list.info', $options);
    }
}

?>
