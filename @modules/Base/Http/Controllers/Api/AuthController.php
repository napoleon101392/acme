<?php

namespace Modules\Base\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\Controller;
use Modules\Authentication\AuthenticationManager;

class AuthController extends Controller
{
    public function login(Request $request, AuthenticationManager $auth)
    {
        try {
            $response = $auth->login($request);

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
