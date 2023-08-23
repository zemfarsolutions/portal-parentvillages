<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\{
    DashboardController,
    IntakeController,
    AppointmentController,
    ScholarshipController,
    FileController
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

    Route::resource('/intakes', IntakeController::class);
    Route::get('/intakes/{intake}/view', [IntakeController::class, 'view']);

    Route::resource('/appointments', AppointmentController::class);
    Route::post('/appointments/delete/{appointment}', [AppointmentController::class, 'destroy']);
    Route::get('/appointments/{appointment}/view', [AppointmentController::class, 'view']);

    Route::resource('/scholarships',ScholarshipController::class);
    Route::get('/scholarships/{scholarship}/view', [ScholarshipController::class, 'view']);
    Route::get('/scholarships/{scholarship}/scholarship-form', [ScholarshipController::class, 'create']);
    
    Route::resource('/files', FileController::class);

});
