<?php

namespace Modules\Equalizer;

use Modules\MakeableTrait;
use Modules\Equalizer\Contracts\LocatorInterface;

final class Equalizer
{
    /** @Undocumented */
    use MakeableTrait;

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
}
