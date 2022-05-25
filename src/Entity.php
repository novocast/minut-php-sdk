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

abstract class Entity implements EntityInterface
{
    protected $apiMethods = ['read'];

    public $appId = null;
    public $appSecret = null;
    public $api = null;


    public function formatResponse($response, $type = 'search')
    {
        return $response;
    }


    public function __construct(Api $client, $config = null)
    {
        /**
         * Sets config ID as app ID
         */
        if ($config !== null) {
            $this->appId = $config['id'];
            $this->appSecret = $config['secret'];
        }

        $this->api = $client;
    }

    public function __call($name, $arguments)
    {
        $response = null;
        if (in_array($name, $this->apiMethods)) {
            $method = $this->getActionVerb($name);
            $api = $this->api;
            $url = $this->getEntityUrl($name);

            if (isset($arguments[0])) {
                $url = $this->getEntityUrl($name, $arguments[0]);
            }

            if (isset($arguments[1])) {
                $url = $url . '?' . http_build_query($arguments[1]);
            }

            $config = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $api->getAccessToken()
                ]
            ];

            $response = $api->$method($url, $config);

            return json_decode($response->getBody());
        }

        // throw error
    }



    public function getActionVerb($action)
    {
        switch ($action) {
            case 'update':
                return 'put';

            case 'delete':
                return $action;

            case 'create':
                return 'post';

            case 'list':
            case 'read':
            default:
                return 'get';
        }
        return 'get';
    }
}
