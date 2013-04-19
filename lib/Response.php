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
        $this->obj = json_decode($this->data);
    }

    public function __get($property) 
    {
        if (strpos($property, '_') == false) {
            // $response->carrier_name maps to $response->carrierName
            /* $property = Mogreet_Utils::fromCamelCase($property); */
        }
        return $this->obj->response->$property;
    }

    public function __toString() 
    {
        return $this->data;
    }
}

?>
