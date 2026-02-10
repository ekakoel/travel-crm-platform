<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\{Lead, Quotation, Booking, Invoice, Company, CrmActivity};

class DashboardController extends Controller
{
    public function index()
    {
        $data = Cache::remember('admin.dashboard', now()->addMinutes(10), function () {
            return [
                'stats' => [
                    'leads' => Lead::today()->count(),
                    'quotations' => Quotation::active()->count(),
                    'expiring' => Quotation::expiring(7)->count(),
                    'revenue' => Invoice::paidThisMonth()->sum('total'),
                    'bookings' => Booking::active()->count(),
                    'agents' => Company::agents()->count(),
                ],
                'funnelData' => [
                    Lead::count(),
                    Lead::contacted()->count(),
                    Quotation::count(),
                    Quotation::won()->count(),
                ],
                'activities' => CrmActivity::latest()->limit(8)->get(),
                'tasks' => [],
                'alerts' => [],
            ];
        });

        return view('admin.dashboard', $data);
    }
}
