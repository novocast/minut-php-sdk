<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\Api;
use Novocast\Minut\Auth;
use Novocast\Minut\Devices;

class ApiTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testConnectionToApi()
    {
        $api = $this->setupApi();
        $auth = new Auth($api);
        $token = $auth->getAccessToken();

        $this->assertSame(gettype($token), 'string');
        $this->assertSame(strlen($token), 291);
    }
}
