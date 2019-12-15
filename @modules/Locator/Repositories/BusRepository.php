<?php

namespace Modules\Locator\Repositories;

class BusRepository
{
    public function first()
    {
        return app('model.bus')->first();
    }
}
