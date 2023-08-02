<?php

use App\Http\Controllers\Employee\{
    DashboardController,
    MilaegeLogController,
    TimeTrackingController
};
use Illuminate\Support\Facades\Route;


Route::middleware('auth.employee')->prefix('/employee')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('employee-dashboard');

    Route::resource('/time-tracking', TimeTrackingController::class);
    Route::resource('/milaege-logs', MilaegeLogController::class);
});