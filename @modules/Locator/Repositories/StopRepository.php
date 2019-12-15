<?php

namespace Modules\Locator\Repositories;

class StopRepository
{
    public function first()
    {
        return app('model.stop')->first();
    }
}
