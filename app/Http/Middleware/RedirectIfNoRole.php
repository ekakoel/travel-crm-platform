<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNoRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user->hasRole('Super Admin')) return redirect()->route('admin.dashboard');
        if ($user->hasRole('Sales')) return redirect()->route('sales.dashboard');
        if ($user->hasRole('Operation')) return redirect()->route('operation.dashboard');
        if ($user->hasRole('Finance')) return redirect()->route('finance.dashboard');
        if ($user->hasRole('Agent')) return redirect()->route('agent.dashboard');
        if ($user->hasRole('Customer')) return redirect()->route('customer.dashboard');

        return $next($request);
    }
}
