<?php

namespace Novocast\Minut\Tests;

use Novocast\Minut\DeviceMotionEvents;
use Novocast\Minut\Devices;
use Novocast\Minut\DeviceTemperature;
use Novocast\Minut\Events;
use PHPUnit\Framework\TestCase;

class EventsTest extends BaseTest
{
    /**
     *
     * @return void
     */
    public function testListEvents()
    {
        $api = $this->authenticate();

        $events = new Events($api);
        $readEvents = $events->list();

        print_r($readEvents);

        $this->assertSame(gettype($readEvents), 'object');
        $this->assertSame(gettype($readEvents->events), 'array');

        // test with a change of get variable
        $readEvents = $events->list([
            'limit' => 5
        ]);

        $this->assertSame(gettype($readEvents), 'object');
        $this->assertSame(gettype($readEvents->events), 'array');
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
