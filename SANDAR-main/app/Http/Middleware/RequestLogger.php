<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(
        $request, 
        Closure $next
    )
    {
        Log::info(
            'Request diterima: ' .
            $request->method() .
            ' ' .
            $request->path()
        );

        return $next($request);
    }
}
