<?php

namespace Modules\Base\Http\Controllers\Api;

use Modules\Base\Http\Controllers\Controller;

class StopController extends Controller
{
    public function index()
    {
        try {
            $stops = app('repository.stop')->get();

            return response()->json($stops);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
