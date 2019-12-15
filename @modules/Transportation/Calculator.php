<?php

namespace Modules\Transportation;

use Modules\Transportation\Support\Converter;

final class Calculator
{
    const PER_MILE = 1.1515;

    protected $data;

    /**
     * Undocumented function
     *
     * @param [type] $to
     * @param [type] $from
     *
     * @return void
     */
    public function getDistance(array $to, array $from)
    {
        $lat1 = $to['latitude'];
        $lon1 = $to['longitude'];
        $lat2 = $from['latitude'];
        $lon2 = $from['longitude'];

        $theta = $lon1 - $lon2;
        $dist  = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist  = acos($dist);
        $dist  = rad2deg($dist);
        $this->data = $miles = $dist * 60 * self::PER_MILE;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function toKilometer()
    {
        return (new Converter)->toKilometer($this->data);
    }
}
