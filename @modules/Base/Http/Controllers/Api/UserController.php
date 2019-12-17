<?php

namespace Modules\Base\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Base\Http\Response;
use Modules\Base\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     *
     * @return void
     */
    public function update(Request $request)
    {
        try {
            $user = app('repository.user')->update($request);

            return Response::make()->default($stops);
        } catch (\Exception $e) {
            return Response::make()->error($e->getMessage());
        }
    }
}
