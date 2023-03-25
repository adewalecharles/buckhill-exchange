<?php

namespace Buckhill\Exchange\Http\Exceptions;

use Exception;

class InvalidContentException extends Exception
{

    public function __construct($message = 'Invalid content')
    {
        parent::__construct($message);
    }
}
