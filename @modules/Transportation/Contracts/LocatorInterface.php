<?php

namespace Modules\Transportation\Contracts;

interface LocatorInterface
{
    /**
     * Undocumented function
     *
     * @param [type] $latitude
     *
     * @return void
     */
    public function setLatitude($latitude);

    /**
     * Undocumented function
     *
     * @param [type] $longitude
     *
     * @return void
     */
    public function setLongitude($longitude);

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLatitude();

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLongitude();
}
