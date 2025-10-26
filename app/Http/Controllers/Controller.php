<?php

namespace App\Http\Controllers;

use App\Helpers\LogContext;
use Illuminate\Support\Facades\Log;
use Throwable;

abstract class Controller
{
    protected function log(string $type, Throwable $exception, string $function)
    {
        Log::$type(strtoupper($type[0]) . substr($type, 1) . ' in ' . $this::class . '@' . $function, LogContext::build($exception));
    }
}
