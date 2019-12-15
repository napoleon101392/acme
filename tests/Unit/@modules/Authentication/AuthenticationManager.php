<?php

namespace Tests\Unit;

use Tests\TestCase;
use Modules\Base\Models\User;
use Illuminate\Http\Request;

class AuthenticationManagerTest extends TestCase
{
    public function testLogin()
    {
        $manager = app('authentication.manager');

        $request = (new Request)->merge([
            // 'client_id' => 2,
            // 'client_secret' => '7flmQVzbuYRCjbHqcAvTZ0FtYJeJvGfL65pbXyzk',
            'email' => 'nap@example.com',
            'password' => 'secret',
            // 'grant_type' => 'password'
        ]);

        $manager->login($request);
    }
}
