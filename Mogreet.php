<?php

$dir = dirname(__FILE__);

require_once($dir . '/lib/Request.php');
require_once($dir . '/lib/Response.php');
require_once($dir . '/lib/Exception.php');
require_once($dir . '/lib/Utils.php');

require_once($dir . '/lib/Keyword.php');
require_once($dir . '/lib/Media.php');
require_once($dir . '/lib/System.php');
require_once($dir . '/lib/Transaction.php');
require_once($dir . '/lib/User.php');
require_once($dir . '/lib/List.php');

if (!function_exists('curl_init')) {
  throw new Exception('mogreet-php needs the CURL PHP extension.');
}

if (!function_exists('json_decode')) {
  throw new Exception('mogreet-php needs the JSON PHP extension.');
}

class Mogreet
{
    const USER_AGENT = 'mogret-php/1.0';
    const BASE_API = 'https://api.mogreet.com';

    private $clientId;
    private $token;
    private $defaultFormat;

    public function __construct($clientId, $token) 
    {
        $this->clientId      = $clientId;
        $this->token         = $token;
        $this->defaultFormat = 'json';
        $this->keyword       = new Mogreet_Keyword($this);
        $this->media         = new Mogreet_Media($this);
        $this->system        = new Mogreet_System($this);
        $this->transaction   = new Mogreet_Transaction($this);
        $this->user          = new Mogreet_User($this);
        $this->list          = new Mogreet_List($this);
    }

    public function processRequest($base, $api, array $params = array(), $multipart = false) 
    {
        // TODO implement flag to do post/get
        $params = array_merge($params, $this->_getDefaultApiParams());
        $data = Mogreet_Request::postRequest($base, $api, $params, $multipart);
        return new Mogreet_Response($params['format'], $data);
    }

    protected function _getDefaultApiParams() 
    {
        return [ "client_id" => $this->clientId, "token" => $this->token, "format" => $this->defaultFormat ];
    }
}

?>
