<?php

namespace Modules\Base\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\Controller;
use Modules\Base\Http\Response;

class StopController extends Controller
{
    /**
     * Displays all bus stops
     *
     * @return void
     */
    public function index(Request $request)
    {
        try {
            $stops = app('repository.stop')->get($request);

            return Response::make()->default($stops);
        } catch (\Exception $e) {
            return Response::make()->error($e->getMessage());
        }
    }
}
