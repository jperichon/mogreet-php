<?php

namespace Mogreet;

include_once('lib/Request.php');
include_once('lib/Response.php');
include_once('lib/Keyword.php');
include_once('lib/Media.php');
include_once('lib/System.php');
include_once('lib/Transaction.php');
include_once('lib/User.php');
include_once('lib/UsersList.php');

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
        $this->keyword = new Keyword($this);
        $this->media = new Media($this);
        $this->system = new System($this);
        $this->transaction = new Transaction($this);
        $this->user = new User($this);
        $this->usersList = new UsersList($this);
    }

    public function processRequest($path, array $params = array(), $multipart = false) 
    {
        // TODO implement flag to do post/get
        $params = array_merge($params, $this->_getDefaultApiParams());
        $data = Request::postRequest($path, $params, $multipart);
        return new Response($params['format'], $data);
    }

    protected function _getDefaultApiParams() {
        return [ "client_id" => $this->clientId, "token" => $this->token, "format" => $this->defaultFormat ];
    }
}

?>
