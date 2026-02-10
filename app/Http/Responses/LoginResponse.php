<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        if ($user->hasRole('Super Admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('Sales')) {
            return redirect()->route('sales.dashboard');
        }

        if ($user->hasRole('Operation')) {
            return redirect()->route('operation.dashboard');
        }

        if ($user->hasRole('Finance')) {
            return redirect()->route('finance.dashboard');
        }

        if ($user->hasRole('Agent')) {
            return redirect()->route('agent.dashboard');
        }

        if ($user->hasRole('Customer')) {
            return redirect()->route('customer.dashboard');
        }

        // fallback
        return redirect()->route('dashboard');
    }
}
