<?php

namespace Modules\Base\Http\Controllers\Api;

use Modules\Base\Http\Response;
use Modules\Base\Http\Controllers\Controller;

class GeneratorController extends Controller
{
    /**
     * To generate random stop location
     *
     * @return void
     */
    public function location()
    {
        try {
            $stop = app('repository.stop')->pickRandom();

            $data = [
                'latitude' => $stop->latitude,
                'longitude' => $stop->longitude
            ];

            return Response::make()->success($data);
        } catch (\Exception $e) {
            return Response::make()->error($e->getMessage());
        }
    }
}
