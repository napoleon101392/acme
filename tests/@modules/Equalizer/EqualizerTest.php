<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Equalizer\Equalizer;
use Modules\Equalizer\Contracts\LocatorInterface;

class EqualizerTest extends TestCase
{
    public function setUp()
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

        $locator = Equalizer::make()->to($bus)->from($bus2)->calculate();

        $this->assertTrue("10,085" === $locator);
    }
}