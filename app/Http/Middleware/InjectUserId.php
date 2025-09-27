<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InjectUserId
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $request->merge([
                'user_id' => auth()->id(),
            ]);
        }
        return $next($request);
    }
}
