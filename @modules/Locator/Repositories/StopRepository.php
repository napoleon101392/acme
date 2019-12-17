<?php

namespace Modules\Locator\Repositories;

use Modules\Transportation\Transportation;

class StopRepository
{
    public function get()
    {
        $user = app('user');
        $stop = app('stop');

        $record = app('model.stop')->all()->filter(function ($model, $index) use ($user, $stop) {
            $user = $user->setLatitude('103.817224802632')->setLongitude('1.28210155945261');

            $stop = $stop->setLatitude($model->latitude)->setLongitude($model->longitude);

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
