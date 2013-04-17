<?php

namespace Mogreet;

class Request 
{
    public static function postRequest($path, $params, $multipart)
    {
        if (!($ch = curl_init())) {
            throw new \Exception("A problem occured during the request");
        }
        curl_setopt($ch, CURLOPT_URL, "https://api.mogreet.com${path}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        if ($multipart) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        if (!($data = curl_exec($ch))) {
            throw new \Exception("A problem occured during the request");
        }
        curl_close($ch);

        return $data;
    }
}

?>
