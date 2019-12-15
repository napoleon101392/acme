<?php

namespace Modules\Locator;

use Modules\Equalizer\Contracts\LocatorInterface;
use Modules\Equalizer\Exceptions\MissingLocationException;

class StopLocator implements LocatorInterface
{
    /**
     * Undocumented function
     *
     * @param [type] $latitude
     *
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param [type] $longitude
     *
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLatitude()
    {
        if (!isset($this->latitude)) {
            throw new MissingLocationException;
        }

        return $this->latitude;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLongitude()
    {
        if (!isset($this->longitude)) {
            throw new MissingLocationException;
        }

        return $this->longitude;
    }
}