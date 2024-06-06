<?php

namespace App\Domain\Core\Http\Middleware ;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request) : string|Null
    {
        return $request->expectsJson() ? null : route('dashboard.login');
    }
}
