<?php

return [
    'bindings' => [
        /**
         * Repositories
         */
        'repository.user' => Modules\Authentication\Repositories\UserRepository::class,

        /**
         * Models
         */
        'model.user' => Acme\Models\User::class,

        /**
         * Core Modules
         */
        'authentication.manager' => Modules\Authentication\AuthenticationManager::class,
        'authentication.passport' => Modules\Authentication\PassportManager::class,
    ]
];
