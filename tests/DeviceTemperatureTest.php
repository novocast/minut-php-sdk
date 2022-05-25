<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\DeviceMotionEvents;
use Novocast\Minut\Devices;
use Novocast\Minut\DeviceTemperature;
use PHPUnit\Framework\TestCase;

class DeviceTemperatureTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testReadMotion()
    {
        $device = $this->getDevice();
        $api = $this->authenticate();

        $temperature = new DeviceTemperature($api);
        $readTemperature = $temperature->read($device->device_id, [
            'start_at' => date('c', time() - 300),
            'end_at' => date('c', time())
        ]);

        $this->assertSame(gettype($readTemperature), 'object');
        $this->assertSame(gettype($readTemperature->values), 'array');

        $timeRes = mt_rand(1, 2);
        // test with a change of get variable
        $readTemperature = $temperature->read($device->device_id, [
            'start_at' => date('c', time() - 100),
            'end_at' => date('c', time()),
            'time_resolution' => $timeRes
        ]);

        $this->assertSame(gettype($readTemperature), 'object');
        $this->assertSame($readTemperature->time_resolution, $timeRes);
        $this->assertSame(gettype($readTemperature->values), 'array');
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
