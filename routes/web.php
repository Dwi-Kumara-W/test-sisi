<?php

use App\Http\Controllers\AuthEmployeeController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LevelMenuController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\MenuManagementController;
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/login-employee', [AuthEmployeeController::class, 'login'])->middleware('guest');
// Route::post('/login', [AuthEmployeeController::class, 'authenticating'])->middleware('guest');
// Route::get('/logout', [AuthEmployeeController::class, 'logout'])->middleware('auth');

Route::get('/employee-attendance', [EmployeeAttendanceController::class, 'index'])->middleware('auth');
Route::get('/create-attendance', [EmployeeAttendanceController::class, 'create'])->middleware('auth');
Route::post('/create-attendance', [EmployeeAttendanceController::class, 'store'])->middleware('auth');

Route::get('/master-employees', [EmployeeController::class, 'index'])->middleware('auth');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->middleware('auth');
Route::get('/employee-edit/{id}', [EmployeeController::class, 'edit'])->middleware('auth');
Route::put('/employee-update/{id}', [EmployeeController::class, 'update'])->middleware('auth');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->middleware('auth');
Route::get('/create-employee', [EmployeeController::class, 'create'])->middleware('auth');
Route::post('/create-employee', [EmployeeController::class, 'store'])->middleware('auth');

Route::get('/menu-service', [MenuManagementController::class, 'index'])->middleware('auth');
Route::delete('/menu-delete/{id}', [MenuManagementController::class, 'destroy'])->middleware('auth');

Route::resource('/userManagement', UsersManagementController::class)->middleware('auth');
Route::resource('/menuManagement', MenuManagementController::class)->middleware('auth');
Route::resource('/levelMenu', LevelMenuController::class)->middleware('auth');

Route::get('/pilih-menu', [MenuManagementController::class, 'indexMenu'])->middleware('auth');
Route::post('/upload-foto/{id}', [UsersManagementController::class, 'avatar'])->name('upload.ava');
Route::post('/pilih-role/{id}', [UsersManagementController::class, 'role'])->name('role.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


