<?php

namespace Modules\Authentication\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    /**
     * Login User
     *
     * @param [type] $email
     * @param [type] $password
     *
     * @return void
     */
    public function login($email, $password)
    {
        $cache = 'login-' . $email;

        if (Cache::has($cache)) {
            $user = Cache::get($cache);
        } else {
            $user = app('model.user')->newQuery()->where('email', $email)->first();
        }

        if (Hash::check($password, $user->password)) {
            Cache::forever($cache, $user);

            return $user;
        }

        throw new \Exception('User not found');
    }

    /**
     * Update authenticated User information
     *
     * @return void
     */
    public function update($request)
    {
        return request()->user()->fill($request);
    }
}
