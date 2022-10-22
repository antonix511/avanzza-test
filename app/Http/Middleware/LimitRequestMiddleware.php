<?php

namespace App\Http\Middleware;

use App\Http\Repositories\LogRepository;
use Closure;
use Illuminate\Http\Request;

class LimitRequestMiddleware
{
    private $repository;

    public function __construct(LogRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $this->repository->get($request->ip(), $request->url(), $request->method());

        if ($response > 2) return response()->json(['ERROR: Máximo 3 consultas de un endpoint por cliente']);

        return $next($request);
    }
}
