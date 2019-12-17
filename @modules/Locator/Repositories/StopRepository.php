<?php

namespace Modules\Locator\Repositories;

use Modules\Transportation\Transportation;

class StopRepository
{
    public function get()
    {
        $userLocator = app('user');
        $stopLocator = app('stop');

        $record = app('model.stop')->all()->filter(function ($model, $index) use ($userLocator, $stopLocator) {
            // $user = $userLocator->setLatitude('103.817224802632')->setLongitude('1.28210155945261');
            $user = $userLocator
                ->setLatitude(request()->user()->latitude)
                ->setLongitude(request()->user()->longitude);


            $stop = $stopLocator->setLatitude($model->latitude)->setLongitude($model->longitude);

            $distance = Transportation::make()->to($user)->from($stop)->calculate();

            if ($distance <= "1") {
                $model->distance = (int)$distance;

                return true;
            }

            return false;
        });

        return $record;
    }
}
