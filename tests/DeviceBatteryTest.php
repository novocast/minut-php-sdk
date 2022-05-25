<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\Account;
use Novocast\Minut\Api;
use Novocast\Minut\Auth;
use Novocast\Minut\DeviceBattery;
use Novocast\Minut\Devices;
use PHPUnit\Framework\TestCase;

class DeviceBatteryTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testReadAccount()
    {
        $device = $this->getDevice();
        $api = $this->authenticate();

        $battery = new DeviceBattery($api);
        $readBattery = $battery->read($device->device_id);

        $this->assertSame(gettype($readBattery), 'object');
        $this->assertSame(gettype($readBattery->values), 'array');

        $timeRes = mt_rand(1, 10);
        // test with a change of get variable
        $readBattery = $battery->read($device->device_id, ['time_resolution' => $timeRes]);

        $this->assertSame(gettype($readBattery), 'object');
        $this->assertSame($readBattery->time_resolution, $timeRes);
        $this->assertSame(gettype($readBattery->values), 'array');
    }


    private function getDevice()
    {
        //$this->assertSame(true, true);
        $api = $this->authenticate();

        $devices = new Devices($api);
        $deviceList = $devices->list();

        return $deviceList[0];
    }
}
