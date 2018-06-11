<?php

namespace App\Http\Middleware;

use Closure;

class IsTeacherOwner
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
        if (!$request->has('course')) return $next($request);
        if ($request->course->teacher_id == auth()->user()->id || auth()->user()->isAdmin()) {
            return $next($request);
        } else {
            flash('No tienes permisos para realizar esta acción')->error();
            return redirect()->route('home');
        }
    }
}
