<?php

namespace Modules\Transportation\Exceptions;

use Exception;

class MissingLocationException extends Exception
{
    public function __construct($message = 'Geo location missing')
    {
        parent::__construct($message);
    }
}
