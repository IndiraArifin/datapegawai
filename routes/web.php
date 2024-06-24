<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
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
    return view('login');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('employees', EmployeeController::class);

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}', 'EmployeeController@show')->name('employees.show');
Route::get('/details', [EmployeeController::class, 'allDetails'])->name('employees.allDetails');