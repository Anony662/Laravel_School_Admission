<?php

// app/Http/Middleware/CheckFormAccessDate.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckFormAccessDate
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $registrationDate = $user->created_at;
            $currentDate = now();

            if ($registrationDate->diffInDays($currentDate) >= 4) {
                return $next($request);
            }

            return redirect()->route('home')->with('error', 'You can access this form only after 4 days of registration.');
        }

        return redirect()->route('login');
    }
}
