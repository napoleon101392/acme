<?php

namespace Modules\Locator\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Transportation\Transportation;

class StopRepository
{
    const NEAREST_STOP = "1.00";

    /**
     * Display all bus stops
     *
     * @return void
     */
    public function all()
    {
        $cache = 'stop-repository-all';

        if (Cache::has($cache)) {
            return Cache::get($cache);
        }

        $record = app('model.stop')->all();

        Cache::forever($cache, $record);

        return $record;
    }

    /**
     * Random record
     *
     * @return void
     */
    public function pickRandom()
    {
        return app('model.stop')->get()->random();
        // return $this->all()->random();
    }

    /**
     * Display nearest Bus stop of the authenticated user
     *
     * @return void
     */
    public function get(Request $request)
    {
        // $cache = 'stop-repository-get-' . $request->latitude . $request->longitude;
        //
        // if (Cache::has($cache)) {
        //     return Cache::get($cache);
        // }

        $userLocator = app('user');
        $stopLocator = app('stop');

        $records = app('model.stop')->get()
            ->map(function ($record) use ($userLocator, $stopLocator, $request) {
                $user = $userLocator
                    ->setLatitude($request->latitude)
                    ->setLongitude($request->longitude);

                $stop = $stopLocator
                    ->setLatitude($record->latitude)
                    ->setLongitude($record->longitude);

                $record->distance = Transportation::make()
                    ->to($user)
                    ->from($stop)
                    ->calculate();

                return $record;
            })
            ->filter(function ($record, $index) use ($request) {
                if ($record->distance <= self::NEAREST_STOP) {
                    return true;
                }

                return false;
            })
            ->take(10);

        // Cache::forever($cache, $record);

        return $records;
    }
}
