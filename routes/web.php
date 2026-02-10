<?php

use App\Models\Quotation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\SalesDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuotationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Super Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn () => view('dashboard.admin'))
            ->name('dashboard');
    });

Route::middleware(['auth', 'role:Sales'])
    ->prefix('sales')
    ->name('sales.')
    ->group(function () {
        Route::get('/dashboard', [SalesDashboardController::class, 'index'])->name('dashboard');
    });

Route::middleware(['auth', 'role:Operation'])
    ->prefix('operation')
    ->name('operation.')
    ->group(function () {
        Route::get('/dashboard', [OperationDashboardController::class, 'index'])->name('dashboard');
    });

Route::middleware(['auth', 'role:Finance'])
    ->prefix('finance')
    ->name('finance.')
    ->group(function () {
        Route::get('/dashboard', [FinanceDashboardController::class, 'index'])->name('dashboard');
    });

Route::middleware(['auth', 'role:Agent'])
    ->prefix('agent')
    ->name('agent.')
    ->group(function () {
        Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');
    });

Route::middleware(['auth', 'role:Customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    });


Route::get('/quotation/{uuid}', function ($uuid) {
    $quotation = Quotation::where('share_uuid', $uuid)
        ->firstOrFail();
    return view('quotation.public', compact('quotation'));
});

require __DIR__.'/auth.php';
