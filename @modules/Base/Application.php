<?php

namespace Modules\Base;

use Illuminate\Foundation\Application as BaseApp;

class Application extends BaseApp
{
    /**
     * @inheritDoc
     */
    protected $namespace = 'Base\\';

    /**
     * @inheritDoc
     */
    public function path($path = '')
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'Base' . DIRECTORY_SEPARATOR . 'app' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
