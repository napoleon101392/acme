<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Equalizer\Equalizer;
use Modules\Equalizer\Contracts\Locator\BusLocator;

class EqualizerTest extends TestCase
{
    public function testGetDistance()
    {
        $bus = (new BusLocator)
            ->setLatidude('32.9697')
            ->setLongitude('-98.53506');

        $bus2 = (new BusLocator)
            ->setLatidude('29.46786')
            ->setLongitude('14.000');

        $locator = Equalizer::make()->to($bus)->from($bus2)->calculate();

        $this->assertTrue("10,085" === $locator);
    }
}
