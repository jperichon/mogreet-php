<?php

class Mogreet_Response
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
        /* $this->obj = json_decode($this->data); */
        $this->obj = Mogreet_Utils::json_to_object(json_decode($this->data, true));
    }

    public function __get($property)
    {
        return $this->obj->response->$property;
    }

    public function __toString()
    {
        return $this->data;
    }
}
