<?php

namespace Mogreet;

class Keyword 
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function listAll($campaignId, array $options = array()) 
    {
        $options['campaign_id'] = $campaignId;
        return $this->client->processRequest('/cm/keyword.list', $options);
    }

    public function check($keyword, array $options = array())
    {
        $options['keyword'] = $keyword;
        return $this->client->processRequest('/cm/keyword.check', $options);
    } 

    public function add($campaignId, $keyword, array $options = array())
    {
        $options['campaign_id'] = $campaignId;
        $options['keyword'] = $keyword;
        return $this->client->processRequest('/cm/keyword.add', $options);
    } 

    public function remove($campaignId, $keyword, array $options = array())
    {
        $options['campaign_id'] = $campaignId;
        $options['keyword'] = $keyword;
        return $this->client->processRequest('/cm/keyword.remove', $options);
    } 

}

?>
