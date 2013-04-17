<?php

namespace Mogreet;

include_once('lib/System.php');
include_once('lib/Transaction.php');
include_once('lib/Media.php');
include_once('lib/Request.php');
include_once('lib/Response.php');

class Client
{

    private $clientId;
    private $token;
    private $defaultFormat;

    public function __construct($clientId, $token) 
    {
        $this->clientId = $clientId;
        $this->token = $token;
        $this->defaultFormat = 'json';
        $this->system = new System($this);
        $this->transaction = new Transaction($this);
        $this->media = new Media($this);
    }

    public function processRequest($path, array $params = array(), $multipart = false) 
    {
        // TODO implement flag to do post/get

        // the merge overrides the same keys
        $params = array_merge($params, $this->_getDefaultApiParams());
        $data = Request::postRequest($path, $params, $multipart);
        return new Response($params['format'], $data);
    }

    protected function _getDefaultApiParams() {
        return [ "client_id" => $this->clientId, "token" => $this->token, "format" => $this->defaultFormat ];
    }
}

?>
