<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApprovedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->status !== 1) {
            auth()->logout();
            return redirect("/");
           // return view("auth/login");
          // return route('/login');
        }

        return $next($request);
    }
}
