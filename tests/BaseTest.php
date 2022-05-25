<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\Api;
use Novocast\Minut\Auth;
use Novocast\Minut\Devices;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{

    /**
     *  
     * @test test to prevent warning in phpunit
     * @return void
     */
    public function testPreventTestWarning()
    {
        $this->assertSame(true, true);
    }

    protected function setupApi()
    {

        $id = '[YOURID]';
        $secret = '[YOURSECRET]';

        $api = new Api($id, $secret);

        return $api;
    }


    protected function authenticate()
    {

        $api = $this->setupApi();
        $auth = new Auth($api);

        // setup access token
        $auth->getAccessToken();

        return $api;
    }
}
