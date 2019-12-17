<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Transportation\Transportation;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BusStopTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        factory(\Modules\Base\Models\Bus::class)->create();
        factory(\Modules\Base\Models\Stop::class)->create();
    }

    public function testGetDistanceOfBusToStop()
    {
        $bus  = resolve('repository.bus')->first();
        $stop = resolve('repository.stop')->first();

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
