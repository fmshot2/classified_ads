<?php

namespace App\Helpers;

class SmsHelper {

    static function send_sms($message, $mobiles, $sender)
    {

        $username = 'eben@eftechnology.net';
        $password = 'Cookies';
            
        $postdata = http_build_query(

            array(
                'username' => $username,
                'password' => $password,
                'message'  => $message,
                'mobiles'  => $mobiles,
                'sender'   => $sender,
            )
        );

        // prepare a http post request
        $opts = array(
            'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        // craete a stream to communicate with betasms api
        $context  = stream_context_create($opts);

        //get result from communication
        $result = file_get_contents('http://login.betasms.com/api/', false, $context);

        // return result to client, this will return the appropriate respond code
        return $result;
    
    }
}