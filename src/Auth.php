<?php

/*
 * This file is part of the Musicbrainz package.
 *
 * © Anthony Totton <novocast7@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Novocast\Minut;

class Auth extends Entity
{

    public $entity = 'oauth';

    public function getEntityUrl($action, $id = null)
    {
        return $this->entity;
    }


    public function getAccessToken()
    {
        $url = $this->entity . '/token';

        $authorization = base64_encode($this->api->appId . ":" . $this->api->appSecret);

        $response = $this->api->post($url, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic ' . $authorization
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
                'response_type' => 'token'
            ]
        ]);

        $token = json_decode($response->getBody());

        $this->api->setAccessToken($token->access_token);

        return $token->access_token;
    }



    public function refresh()
    {
    }
}
