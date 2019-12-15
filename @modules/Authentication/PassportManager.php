<?php

namespace Modules\Authentication;

use DateInterval;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Laravel\Passport\Bridge\PersonalAccessGrant;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\AuthorizationServer;

class PassportManager
{
    public function __construct()
    {
        $oauth2 = app()->make(AuthorizationServer::class);
        $oauth2->enableGrantType(
            new PersonalAccessGrant,
            new DateInterval('P1W')
        );
    }

    /**
     * Generate a personal token.
     *
     * @param [type] $request
     * @param [type] $user
     *
     * @return void
     */
    public function personalToken($request, $user = null)
    {
        $request
            ->setUserResolver(function () use ($user) {
                return $user;
            })
            ->merge([
                'name'  => sprintf('Personal Token for [%s]', $request->email),
                'scope' => $request->scope ?? [],
            ]);

        $controller = new PersonalAccessTokenController(
            resolve(TokenRepository::class),
            resolve(ValidationFactory::class)
        );

        return $controller->store($request);
    }
}
