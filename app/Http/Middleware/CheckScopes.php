<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Passport\Http\Middleware\CheckForAnyScope as BaseMiddleware;
use Illuminate\Auth\AuthenticationException;

class CheckScopes extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next, ...$scopes)
    {
     $scope = $request->route()->getName();
     if($scope){
        if (! $request->user() || ! $request->user()->token()) {
            throw new AuthenticationException;
        }
        if (! $request->user()->tokenCan($scope)) {
            $code = 422;
            $output = [
                'message' => 'Invalid scope(s) provided.',
            ];
         return response()->json($output, $code);
        }
    }
    return $next($request);
}
}
