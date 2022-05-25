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

use GuzzleHttp\Client;
use Exception;


class Api
{
    private $endpoint = 'https://api.minut.com/v7/';
    private $config = [
        'id' => '',
        'format' => 'json'
    ];

    private $client = null;
    private $accessToken = null;
    public $appId = null;
    public $appSecret = null;


    public function __construct($appId, $appSecret)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }


    public function setAccessToken($token)
    {
        $this->accessToken = $token;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }


    public function __call($name, $arguments)
    {
        if ($this->client === null) {
            $this->client = new Client();
        }

        $arguments[0] = $this->endpoint . $arguments[0];

        //$this->client->getCurlOptions()->set(CURLOPT_RETURNTRANSFER, true);

        try {
            return $this->client->$name(...$arguments);
        } catch (Exception $e) {
            error_log('invalid method: ' . $name);
            error_log($e->getMessage());
            return null;
        }
    }
}
