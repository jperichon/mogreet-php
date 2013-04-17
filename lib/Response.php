<?php

namespace Mogreet;

class Response 
{
    private $format;
    private $data;
    private $obj;

    public function __construct($format, $data) 
    {
        $this->format = $format;
        $this->data = $data;

        $this->buildObjectFromJson();
    }

    protected function buildObjectFromJson() 
    {
        $arr = json_decode($this->data, true);
        $this->obj = (object) $arr['response'];
    }

    public function __get($property) 
    {
        return $this->obj->$property;
    }

    public function toString() 
    {
        return $this->data;
    }
}

?>
