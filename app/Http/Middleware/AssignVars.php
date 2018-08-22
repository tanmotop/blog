<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Tag;
use Closure;

class AssignVars
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
        view()->share('categories', Category::all());
        view()->share('tags', Tag::all());
        return $next($request);
    }
}
