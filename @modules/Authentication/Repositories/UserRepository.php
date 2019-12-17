<?php

namespace Modules\Authentication\Repositories;

class UserRepository
{
    public function login($email, $password)
    {
        $user = app('model.user')->newQuery()->where('email', $email)->first();

        if (Hash::check($password, $user->password)) {
            return $user;
        }

        throw new \Exception('User not found');
    }
}
