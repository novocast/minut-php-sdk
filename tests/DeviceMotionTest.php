<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\DeviceMotionEvents;
use Novocast\Minut\Devices;
use PHPUnit\Framework\TestCase;

class DeviceMotionTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testReadMotion()
    {
        $device = $this->getDevice();
        $api = $this->authenticate();

        $motion = new DeviceMotionEvents($api);
        $readMotion = $motion->read($device->device_id, [
            'start_at' => date('c', time() - 300),
            'end_at' => date('c', time())
        ]);

        $this->assertSame(gettype($readMotion), 'object');
        $this->assertSame(gettype($readMotion->values), 'array');

        $timeRes = mt_rand(1, 2);
        // test with a change of get variable
        $readMotion = $motion->read($device->device_id, [
            'start_at' => date('c', time() - 100),
            'end_at' => date('c', time()),
            'time_resolution' => $timeRes
        ]);

        $this->assertSame(gettype($readMotion), 'object');
        $this->assertSame($readMotion->time_resolution, $timeRes);
        $this->assertSame(gettype($readMotion->values), 'array');
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
