<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Transportation\Transportation;
use Modules\Transportation\Contracts\LocatorInterface;

class TransportationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->assertTrue(resolve('bus') instanceof LocatorInterface);
    }

    public function testGetDistance()
    {
        $bus = resolve('bus')
            ->setLatitude('32.9697')
            ->setLongitude('-98.53506');

        $bus2 = resolve('bus')
            ->setLatitude('29.46786')
            ->setLongitude('14.000');

        $locator = Transportation::make()->to($bus)->from($bus2)->calculate();

        $this->assertTrue("10,085" === $locator);
    }
}
