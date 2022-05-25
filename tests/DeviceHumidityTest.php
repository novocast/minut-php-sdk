<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\DeviceHumidity;
use Novocast\Minut\Devices;
use PHPUnit\Framework\TestCase;

class DeviceHumidityTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testReadHumidity()
    {
        $device = $this->getDevice();
        $api = $this->authenticate();

        $humidity = new DeviceHumidity($api);
        $readHumidity = $humidity->read($device->device_id);

        $this->assertSame(gettype($readHumidity), 'object');
        $this->assertSame(gettype($readHumidity->values), 'array');

        $timeRes = mt_rand(1, 10);
        // test with a change of get variable
        $readHumidity = $humidity->read($device->device_id, ['time_resolution' => $timeRes]);

        $this->assertSame(gettype($readHumidity), 'object');
        $this->assertSame($readHumidity->time_resolution, $timeRes);
        $this->assertSame(gettype($readHumidity->values), 'array');
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
