<?php

return [
    'bindings' => [
        /**
         * Repositories
         */
        'repository.user' => Modules\Authentication\Repositories\UserRepository::class,
        'repository.bus' => Modules\Locator\Repositories\BusRepository::class,
        'repository.stop' => Modules\Locator\Repositories\StopRepository::class,

        /**
         * Models
         */
        'model.user' => Acme\Models\User::class,
        'model.bus' => Acme\Models\Bus::class,
        'model.stop' => Acme\Models\Stop::class,

        /**
         * Core Modules
         */
        'bus' => Modules\Locator\Bus::class,
        'stop' => Modules\Locator\Stop::class,
        'authentication.manager' => Modules\Authentication\AuthenticationManager::class,
        'authentication.passport' => Modules\Authentication\PassportManager::class,
    ]
];
