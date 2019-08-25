<?php
/**
 * Created by PhpStorm.
 * User: yemi
 * Date: 23/08/2019
 * Time: 4:17 AM
 */

namespace App;


class Google
{

    public function client()
    {
        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URL'));
        $client->setScopes(explode(',', env('GOOGLE_SCOPES')));
        $client->setApprovalPrompt(env('GOOGLE_APPROVAL_PROMPT'));
        $client->setAccessType(env('GOOGLE_ACCESS_TYPE'));

        return $client;
    }


    public function doc($client)
    {
        $doc = new \Google_Service_Docs($client);
        return $doc;
    }

    public function drive($client)
    {
        $drive = new \Google_Service_Drive($client);
        return $drive;
    }

    public function service($client)
    {
        $service = new \Google_Service_Books($client);
        return $service;
    }
}