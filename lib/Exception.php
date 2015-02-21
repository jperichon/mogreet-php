<?php

class Mogreet_Exception
    extends Exception
{
    protected $api;
    protected $params;

    public function __construct($message, $api = '', $params = null, $code = 0)
    {
        $this->api = $api;
        $this->params = $params;
        parent::__construct($message, $code);
    }

    public function getApi()
    {
        return $this->api;
    }

    public function getParams()
    {
        return $this->params;
    }
}
