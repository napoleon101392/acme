<?php

namespace Acme;

use Illuminate\Foundation\Application as BaseApp;

class Application extends BaseApp
{
    /**
     * @inheritDoc
     */
    protected $namespace = 'Acme\\';

    /**
     * @inheritDoc
     */
    public function path($path = '')
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'acme' . DIRECTORY_SEPARATOR . 'app' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
