<?php

namespace Modules\Base\Http\Controllers\Api;

use Modules\Base\Http\Response;
use Modules\Base\Http\Controllers\Controller;

class StopController extends Controller
{
    /**
     * Displays all bus stops
     *
     * @return void
     */
    public function index()
    {
        try {
            $stops = app('repository.stop')->get();

            return Response::make()->default($stops);
        } catch (\Exception $e) {
            return Response::make()->error($e->getMessage());
        }
    }
}
