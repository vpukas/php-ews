<?php

namespace jamesiarmes\PhpEws;

class EWSAuth
{
    public static function getTokenFromAuthorizationCode(
        $clientId,
        $clientSecret,
        $tokenEndPoint = 'https://login.microsoftonline.com/common/oauth2/token'
    ) {
        $postOptions = [
            'body' => [
                'client_id' => $clientId,
                'scope' => 'https://outlook.office365.com/.default',
                'client_secret' => $clientSecret,
                'grant_type' => 'client_credentials'
            ],
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->post($tokenEndPoint, $postOptions);
        $response = "".$response->getBody();

        $response = json_decode($response);

        return $response->access_token;
    }
}