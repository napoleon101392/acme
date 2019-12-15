<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Equalizer\Equalizer;
use Modules\Equalizer\Exceptions\MissingLocationException;

class MissingLocationExceptionsTest extends TestCase
{
    public function testMissingLocationException()
    {
        $this->expectException(MissingLocationException::class);
        $bus  = app('bus');
        $bus2 = app('bus');

        $locator = Equalizer::make()->to($bus)->from($bus2)->calculate();
    }
}
