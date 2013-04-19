<?php

class Mogreet_Utils
{

    public static function toCamelCase($str) 
    {
        return preg_replace('/_([a-z])/e', "strtoupper('\\1')", $str);
    }

    public static function fromCamelCase($str)
    {
        $str = preg_replace('/(?<=\\w)(?=[A-Z])/',"_$1", $str);
        return strtolower($str);
    }
}

?>
