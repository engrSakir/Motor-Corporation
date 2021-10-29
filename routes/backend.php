<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\InvestmentController;
use App\Http\Controllers\Backend\InvestorContactPersonController;
use App\Http\Controllers\Backend\InvestorController;
use App\Http\Controllers\Backend\SettlementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::group(['as' => 'backend.', 'prefix' => 'backend/', 'middleware' => 'auth'], function () {
    Route::resource('investor', InvestorController::class);
    Route::resource('investment', InvestmentController::class);
    Route::resource('investorContactPerson', InvestorContactPersonController::class);
    Route::resource('settlement', SettlementController::class);
});
