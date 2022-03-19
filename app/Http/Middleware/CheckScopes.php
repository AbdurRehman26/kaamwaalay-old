<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Laravel\Passport\Http\Middleware\CheckForAnyScope as BaseMiddleware;
use function Pest\Laravel\json;

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
        \Log::info('scope');
        \Log::info($scope);

        \Log::info('for user');
        \Log::info(json_encode($request->user()));

        if ($scope) {
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
