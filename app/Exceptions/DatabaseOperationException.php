<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class DatabaseOperationException extends Exception
{
    protected $message = 'Internal server error';

    protected $code = 500;
}
