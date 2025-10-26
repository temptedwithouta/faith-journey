<?php

namespace App\Helpers;

use Illuminate\Container\Attributes\Singleton;
use Throwable;

#[Singleton()]
class LogContext
{
    public static function build(Throwable $exception): array
    {
        [$trace] = $exception->getTrace();

        return [
            'class' => $trace['class'],
            'function' => $trace['function'],
            'params' => $trace['args'],
            'exception_type' => $exception::class,
            'error_message' => $exception->getMessage(),
        ];
    }
}