<?php

namespace Modules\Locator\Repositories;

class BusRepository
{
    public function create()
    {
        app('model.bus')->create();

        $this->cacheBusStops();
    }

    public function update()
    {
        app('user.bus')->fill('');

        $this->cacheBusStops();
    }

    public function all()
    {
        if (Cache::has('bus_stops')) {
            return Cache::get('bus_stops');
        }

        return $this->cacheBusStops();
    }

    public function first()
    {
        return app('model.bus')->first();
    }

    protected function cacheBusStops()
    {
        Cache::forever('bus_stops', BusStop::all());

        // you can use this in the UI to show the last updated of your record
        Cache::forever(
            'bus_stops_last_updated_at',
            (string) BusStop::orderBy('updated_at', 'desc')
                ->first()
                ->updated_at
        );

        return $stops;
    }
}
