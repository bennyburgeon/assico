<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('company', CompanyController::class);
        Route::resource('employee', EmployeeController::class);
        Route::get('users', [UserController::class,'index'])->name('users.index');
        Route::get('users/datatables', [UserController::class,'datatables'])->name('users.datatables');
    });
