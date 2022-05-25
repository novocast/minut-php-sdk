<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\Devices;

class DeviceTest extends BaseTest
{

    /**
     *
     * @return void
     */
    public function testListDevices()
    {
        //$this->assertSame(true, true);
        $api = $this->authenticate();

        $devices = new Devices($api);
        $deviceList = $devices->list();

        $this->assertSame(gettype($deviceList), 'array');

        if (isset($deviceList[0])) {
            $this->assertSame(gettype($deviceList[0]), 'object');
        }

        return $deviceList[0];
    }


    /**
     *
     * @return void
     */
    public function testReadDevice()
    {
        $device = $this->getDevice();
        $api = $this->authenticate();

        $devices = $this->testListDevices();

        $devices = new Devices($api);
        $readDevice = $devices->read($device->device_id);

        $this->assertSame(gettype($readDevice), 'object');
        $this->assertSame($readDevice->device_id, $device->device_id);
    }

    /**
     *
     * @return void
     */
    public function testUpdateDevice()
    {
        $this->assertSame(true, true);
    }

    /**
     *
     * @return void
     */
    /*public function testDeleteDevice()
    {
        $this->assertSame(true, true);
    }*/



    private function getDevice()
    {
        //$this->assertSame(true, true);
        $api = $this->authenticate();

        $devices = new Devices($api);
        $deviceList = $devices->list();

        return $deviceList[0];
    }
}
