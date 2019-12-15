<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Transporation\Transporation;
use Modules\Transporation\Exceptions\MissingLocationException;

class MissingLocationExceptionsTest extends TestCase
{
    public function testMissingLocationException()
    {
        $this->expectException(MissingLocationException::class);
        $bus  = app('bus');
        $bus2 = app('bus');

        $locator = Transporation::make()->to($bus)->from($bus2)->calculate();
    }
}
