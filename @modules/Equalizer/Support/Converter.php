<?php

namespace Modules\Equalizer\Support;

use Illuminate\Support\Collection;

class Converter
{
    const KILOMETER = 1.609344;

    /**
     * Undocumented function
     *
     * @param [type] $data
     *
     * @return void
     */
    public function toKilometer($data)
    {
        return number_format(round($data * self::KILOMETER));
    }
}
