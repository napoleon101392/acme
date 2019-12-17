<?php

namespace Modules\Base\Http\Controllers\Api;

use Modules\Base\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request, AuthenticationManager $auth)
    {
        try {
            $login = $auth->login($request->email, $request->password);

            return response()->json($login);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }
}
