<?php

class Mogreet_Request 
{
    private static $_requiredParams = array(
        'system.ping'        => array(),
        'transaction.send'   => array('campaign_id', 'to', 'message'),
        'transaction.lookup' => array('message_id', 'hash'),
        'user.transactions'  => array('number'),
        'user.getopt'        => array('number'),
        'user.info'          => array('number'),
        'user.lookup'        => array('number'),
        'user.uncache'       => array('number'),
        'keyword.list'       => array('campaign_id'),
        'keyword.check'      => array('keyword'),
        'keyword.add'        => array('campaign_id', 'keyword'),
        'keyword.remove'     => array('campaign_id', 'keyword'),
        'media.remove'       => array('content_id'),
        'media.list'         => array(),
        'media.upload'       => array('type', 'name'),
        'list.destroy'       => array('list_id', 'name'),
        'list.empty'         => array('list_id', 'name'),
        'list.download'      => array('list_id'),
        'list.send'          => array('list_id', 'campaign_id', 'message'),
        'list.prune'         => array('list_id', 'numbers'),
        'list.append'        => array('list_id', 'numbers'),
        'list.create'        => array('name'),
        'list.list'          => array(),
        'list.info'          => array('list_id'),
    );

    protected static function _checkParams($api, $params)
    {
        $missingParams = array_diff(Mogreet_Request::$_requiredParams[$api], array_keys($params));
        if (count($missingParams) != 0) {
            throw new Mogreet_Exception(
                'Missing required params: '. implode($missingParams, ', '), $api, $params
            );
        }
    }

    public static function postRequest($base, $api, $params, $multipart) 
    {
        Mogreet_Request::_checkParams($api, $params);

        if (!($ch = curl_init())) {
            throw new Exception("A problem occured during the request");
        }
        curl_setopt($ch, CURLOPT_URL, Mogreet::BASE_API . '/' . $base . '/' . $api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_USERAGENT, Mogreet::USER_AGENT);

        if ($multipart) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        if (!($data = curl_exec($ch))) {
            throw new Exception("A problem occured during the request");
        }
        curl_close($ch);

        return $data;
    }
}

?>
