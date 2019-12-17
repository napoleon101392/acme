<?php

namespace Modules\Locator\Repositories;

use Illuminate\Support\Facades\Cache;
use Modules\Transportation\Transportation;

class StopRepository
{
    const NEAREST_STOP = "1";

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
    }

    /**
     * Display nearest Bus stop of the authenticated user
     *
     * @return void
     */
    public function get()
    {
        $cache = 'stop-repository-get-' . request()->user()->latitude . request()->user()->longitude;

        // if (Cache::has($cache)) {
        //     return Cache::get($cache);
        // }

        $userLocator = app('user');
        $stopLocator = app('stop');

        $record = app('model.stop')->all()->filter(function ($model, $index) use ($userLocator, $stopLocator) {
            $user = $userLocator
                ->setLatitude(request()->user()->latitude)
                ->setLongitude(request()->user()->longitude);

            $stop = $stopLocator
                ->setLatitude($model->latitude)
                ->setLongitude($model->longitude);

            $distance = Transportation::make()
                ->to($user)
                ->from($stop)
                ->calculate();

            if ($distance <= self::NEAREST_STOP) {
                $model->distance = (int) $distance;

                return true;
            }

            return false;
        });

        Cache::forever($cache, $record);

        return $record;
    }
}
