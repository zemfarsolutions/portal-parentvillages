<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\{
    DashboardController,
    IntakeController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . "/auth.php";

require __DIR__ . "/employee.php";

Route::middleware('auth')->prefix('/client')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client-dashboard');

    // Intake Form Routes 
    Route::prefix('/intake-form/')->group(function(){
        Route::get('/view',[IntakeController::class,'index']);
        Route::get('/view_intake_form',[IntakeController::class,'view_intake_form']);
    });

    Route::get('/intake-form', [DashboardController::class, 'show']);
    Route::post('/intake-form/submit', [DashboardController::class, 'submit']);
});
