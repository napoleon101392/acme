<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Transportation\Transportation;
use Modules\Transportation\Exceptions\MissingLocationException;

class MissingLocationExceptionsTest extends TestCase
{
    public function testMissingLocationException()
    {
        $this->expectException(MissingLocationException::class);
        $bus  = app('bus');
        $bus2 = app('bus');

        $locator = Transportation::make()->to($bus)->from($bus2)->calculate();
    }
}
