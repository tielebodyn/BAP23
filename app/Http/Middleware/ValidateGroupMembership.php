<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ValidateGroupMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if user is in group
        $group = $request->route('group');
        $user = $request->user();
        if (!$user->groups->contains($group)) {
            abort(404);
        }
        // if group is is equal to current session
        if (Session::get('currentGroup') != $group->id) {
            Session::put('currentGroup', $group->id);
        }


       // save cookie

        return $next($request);
    }
}
