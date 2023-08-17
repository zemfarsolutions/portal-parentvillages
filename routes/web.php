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

    // /intake GET
    // /intake/create GET
    // /intake/store POST
    // /intake/1/view GET
    // /intake/1/edit GET
    // /intake/update POST

    // Intake Form Routes 
    // Route::prefix('/intake/')->group(function(){
    //     Route::get('/view',[IntakeController::class,'index']);
    //     Route::get('/view_intake_form',[IntakeController::class,'view']);
    //     Route::match(['get','post'],'/create', [IntakeController::class, 'create']);

    // });

    Route::resource('/intakes', IntakeController::class);

    // Route::get('/intake-form', [DashboardController::class, 'show']);
    // Route::post('/intake-form/submit', [DashboardController::class, 'submit']);
});
