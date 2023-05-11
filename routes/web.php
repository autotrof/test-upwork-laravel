<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\HrController as AdminHrController;
use App\Http\Controllers\admin\InvestigatorController as AdminInvestigatorController;
use App\Http\Controllers\hr\HrController;
use App\Http\Controllers\investigator\InvestigatorController;

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

Route::get('/', function () {
 return view('auth.login');
});

Auth::routes();
// Users Routes

Route::middleware(['admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/',[AdminController::class, 'index']);
    Route::resource('hr', AdminHrController::class)->except('show', 'update');
    Route::resource('investigator', AdminInvestigatorController::class)->except('show', 'update');
});

Route::middleware(['hr'])->prefix('hr')->group(function () {
    Route::get('/',[HrController::class, 'index']);
});

Route::middleware(['investigator'])->prefix('investigator')->group(function () {
    Route::get('/',[InvestigatorController::class, 'index']);
    Route::get('/profile',[InvestigatorController::class, 'viewProfile']);
    Route::post('/profile/submit' ,[InvestigatorController::class, 'store'])->name('submit_investigator_profile');
});
