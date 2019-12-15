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
        'model.user' => Incube\Models\User::class,
        'model.bus' => Incube\Models\Bus::class,
        'model.stop' => Incube\Models\Stop::class,

        /**
         * Core Modules
         */
        'bus' => Modules\Locator\BusLocator::class,
        'stop' => Modules\Locator\StopLocator::class,
        'authentication.manager' => Modules\Authentication\AuthenticationManager::class,
        'authentication.passport' => Modules\Authentication\PassportManager::class,
    ]
];
