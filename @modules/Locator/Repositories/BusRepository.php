<?php

namespace Modules\Locator\Repositories;

class BusRepository
{
    /**
     * Display all bus stops
     *
     * @return void
     */
    public function all()
    {
        $cache = 'bus-repository-all';

        if (Cache::has($cache)) {
            return Cache::get($cache);
        }

        $record = app('model.bus')->all();

        Cache::forever($cache, $record);

        return $record;
    }

    /**
     * Create a bus
     *
     * @param [type] $request
     *
     * @return void
     */
    public function create($request)
    {
        $cache = 'bus-repository-all';

        if (Cache::has($cache)) {
            return Cache::get($cache);
        }

        $create = app('model.bus')->create([
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Cache::forever($cache, $create);

        return $record;
    }

    /**
     * update a bus
     *
     * @param [type] $bus
     * @param [type] $request
     *
     * @return void
     */
    public function update($bus, $request)
    {
        $cache = 'bus-repository-all';

        if (Cache::has($cache)) {
            return Cache::get($cache);
        }

        $update = app('user.bus')->find($bus)->fill($request);

        Cache::forever($cache, $update);

        return $record;
    }
}
