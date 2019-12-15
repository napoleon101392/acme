<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Transporation\Calculator;

class CalculatorTest extends TestCase
{
    public function testGetDistance()
    {
        $firstPoint = [
            'latitude'  => '32.9697',
            'longitude' => '-98.53506',
        ];
        $secondPoint = [
            'latitude'  => '29.46786',
            'longitude' => '14.000',
        ];

        $result = (new Calculator)->getDistance($firstPoint, $secondPoint)->toKilometer();

        $this->assertTrue("10,085" === $result);
    }
}
