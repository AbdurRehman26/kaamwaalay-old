<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Passport\Http\Middleware\CheckForAnyScope as BaseMiddleware;

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
        $op = explode(".", $scope);
        $op = $op[sizeof($op)-1];

        $scopeArray = array();

     if($scope){
        if(sizeof($scopeArray)) {
            return parent::handle($request, $next, ...$scopeArray);
        }
        return parent::handle($request, $next, $scope);
    }
    return $next($request);
}
}
