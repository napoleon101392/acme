<?php

namespace Modules\Transporation\Exceptions;

use Exception;

class MissingLocationException extends Exception
{
    public function __construct($message = 'Geo location missing')
    {
        parent::__construct($message);
    }
}
