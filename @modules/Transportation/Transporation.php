<?php

namespace Modules\Transportation;

use Modules\Transportation\Contracts\LocatorInterface;

final class Transportation
{
    /**
     * Undocumented function
     *
     * @param LocatorInterface $location
     *
     * @return void
     */
    public function to(LocatorInterface $location)
    {
        $this->to = $this->setDistance($location);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param LocatorInterface $location
     *
     * @return void
     */
    public function from(LocatorInterface $location)
    {
        $this->from = $this->setDistance($location);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param [type] $location
     *
     * @return void
     */
    protected function setDistance($location)
    {
        if (is_callable($location)) {
            return call_user_func($location);
        }

        return [
            'latitude'  => $location->getLatitude(),
            'longitude' => $location->getLongitude(),
        ];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function calculate()
    {
        return (new Calculator)->getDistance($this->to, $this->from)->toKilometer();
    }

    /**
     * Should be able to create a self instance thru static call.
     *
     * This is similarly for Laravel devs.
     *
     * @return self
     */
    public static function make()
    {
        return new static();
    }
}
