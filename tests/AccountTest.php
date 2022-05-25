<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\Account;
use Novocast\Minut\Api;
use Novocast\Minut\Auth;
use Novocast\Minut\Devices;
use PHPUnit\Framework\TestCase;

class AccountTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testReadAccount()
    {
        $api = $this->authenticate();

        $account = new Account($api);
        $readAccount = $account->read();

        $this->assertSame(gettype($readAccount), 'object');
    }
}
