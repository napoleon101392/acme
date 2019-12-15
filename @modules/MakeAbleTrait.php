<?php

namespace Modules;

trait MakeableTrait
{
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
    /**
     * Should be able to create a self instance thru static call.
     *
     * This is similarly for Symfony devs.
     *
     * @return self
     */
    public static function getInstance()
    {
        return static::make();
    }
}
