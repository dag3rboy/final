<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AssistantsAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('LoggedAssistant') && ($request->path() != 'assistant-login')) {
            return redirect('assistant-login')->with('fail', 'You must be logged in!');
        }

        if (session()->has('LoggedAssistant') && ($request->path() == 'assistant-login')) {
            return back();
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expire', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
