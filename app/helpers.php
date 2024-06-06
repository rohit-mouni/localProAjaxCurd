<?php
use Twilio\Rest\Client;

function SendTwilioNotification($userNo,$msg)
{
    $account_sid = getenv("TWILIO_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_NUMBER");
    $client = new Client($account_sid, $auth_token);
    $info = $client->messages->create($userNo,
    ['from' => $twilio_number, 'body' => $msg]);
    return $info;
}
