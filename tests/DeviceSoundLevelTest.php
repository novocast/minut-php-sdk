<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\DeviceHumidity;
use Novocast\Minut\Devices;
use Novocast\Minut\DeviceSoundLevel;
use PHPUnit\Framework\TestCase;

class DeviceSoundLevelTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testReadHumidity()
    {
        $device = $this->getDevice();
        $api = $this->authenticate();

        $soundLevel = new DeviceSoundLevel($api);
        $readSound = $soundLevel->read($device->device_id);

        $this->assertSame(gettype($readSound), 'object');
        $this->assertSame(gettype($readSound->values), 'array');

        $timeRes = mt_rand(1, 10);
        // test with a change of get variable
        $readSound = $soundLevel->read($device->device_id, ['time_resolution' => $timeRes]);

        $this->assertSame(gettype($readSound), 'object');
        $this->assertSame($readSound->time_resolution, $timeRes);
        $this->assertSame(gettype($readSound->values), 'array');
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
