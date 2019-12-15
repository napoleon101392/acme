<?php

namespace Modules\Authentication\Repositories;

class UserRepository
{
    public function findByEmail($email)
    {
        return app('model.user')->newQuery()->where('email', $email)->first();
    }
}
