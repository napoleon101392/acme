<?php

namespace Modules\Base\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Base\Http\Response;
use Base\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Http\Controllers\Controller;
use Modules\Authentication\AuthenticationManager;

class AuthController extends Controller
{
    /**
     * Logs the user in
     *
     * @param Request $request
     * @param AuthenticationManager $auth
     *
     * @return void
     */
    public function login(LoginRequest $request, AuthenticationManager $auth)
    {
        try {
            $response = $auth->login($request);

            return Response::make()->default($response);
        } catch (\Exception $e) {
            return Response::make()->error($e->getMessage());
        }
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        try {
            if (auth()->check()) {
                request()->user()->token()->revoke();
            }

            return Response::make()->message('Logged out');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
