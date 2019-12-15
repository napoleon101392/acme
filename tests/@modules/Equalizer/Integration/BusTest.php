<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Equalizer\Equalizer;

class BusTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        factory(resolve('model.bus'));
        factory(resolve('model.stop'));
    }

    public function testGetDistanceOfBusToStop()
    {
        $bus = resolve('repository.bus')->first();
        $stop = resolve('repository.stop')->first();

        $bus = resolve('bus')
            ->setLatitude($bus->latitude)
            ->setLongitude($bus->longitude);

        $stop = resolve('stop')
            ->setLatitude($stop->latitude)
            ->setLongitude($stop->longitude);

        $result = Equalizer::make()->to($bus)->from($stop)->calculate();

        $this->assertTrue("10,085" === $result);
    }
}
