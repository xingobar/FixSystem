<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if(!empty($user))
        {
            if(!$user->isAdmin())
            {
                if($request->ajax() || $request->wantsJson())
                {
                    return response('Unauthrozied',401);
                }
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
