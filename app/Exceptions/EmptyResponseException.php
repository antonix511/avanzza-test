<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class EmptyResponseException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {

    }
}
