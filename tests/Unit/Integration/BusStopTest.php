<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Transportation\Transportation;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BusStopTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetDistanceOfBusToStop()
    {
        $bus  = resolve('model.bus')->first();
        $stop = resolve('model.stop')->first();

        $bus = resolve('bus')
            ->setLatitude($bus->latitude)
            ->setLongitude($bus->longitude);

        $stop = resolve('stop')
            ->setLatitude($stop->latitude)
            ->setLongitude($stop->longitude);

        $result = Transportation::make()->to($bus)->from($stop)->calculate();

        $this->assertTrue("10,085" === $result);
    }
}
