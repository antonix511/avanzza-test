<?php

namespace App\Http\Middleware;

use App\Models\CustomLog;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function terminate(Request $request, JsonResponse $response)
    {
        $log = new CustomLog();
        $log->ip = $request->ip();
        $log->endpoint = $request->url();
        $log->method = $request->method();
        $log->save();

        return $response;
    }
}
