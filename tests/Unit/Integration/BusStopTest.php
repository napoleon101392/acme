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
        $bus = resolve('bus')
            ->setLatitude('32.9697')
            ->setLongitude('-98.53506');

        $stop = resolve('stop')
            ->setLatitude('29.46786')
            ->setLongitude('14.000');

        $result = Transportation::make()->to($bus)->from($stop)->calculate();

        $this->assertTrue("10,085" === $result);
    }
}
