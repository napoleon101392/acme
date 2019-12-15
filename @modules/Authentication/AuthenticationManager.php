<?php

namespace Modules\Authentication;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthenticationManager
{
    /**
     * Logs the user in
     *
     * @param Request $request
     *
     * @return void
     */
    public function login(Request $request)
    {
        $user = app('repository.user')->findByEmail($request->email);

        $return = app('authentication.passport')->personalToken($request, $user);

        return [
            'access_token' => $return->accessToken,
            'created_at'   => Carbon::parse($return->token->created_at)->setTimezone(config('app.timezone')),
            'expires_at'   => Carbon::parse($return->token->expires_at)->setTimezone(config('app.timezone')),
            // 'created_at'   => with_timezone($return->token->created_at),
            // 'expires_at'   => with_timezone($return->token->expires_at),
        ];
    }
}
