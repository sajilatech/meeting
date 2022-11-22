<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssignTaskController;
use App\Http\Controllers\MeetingPlanner;
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
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('login', [SessionController::class, 'store']);
Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('register', [UserController::class, 'create']);
Route::post('register', [UserController::class, 'store']);

Route::get('edit_password', [UserController::class, 'edit_password']);
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('employees', [EmployeeController::class, 'index']);
Route::get('create_employee', [EmployeeController::class, 'create']);
Route::post('create_employee', [EmployeeController::class, 'store']);
Route::post('update/{id}', [EmployeeController::class, 'update']);
Route::get('edit/{id}', [EmployeeController::class, 'edit']);
Route::get('delete/{id}', [EmployeeController::class, 'delete']);


Route::get('assign_task', [AssignTaskController::class, 'create_data']);
Route::post('assign_task', [AssignTaskController::class, 'store_data']);
Route::get('edit_task/{id}', [AssignTaskController::class, 'edit']);
Route::post('update_task/{id}', [AssignTaskController::class, 'update']);
Route::get('assign_task_view', [AssignTaskController::class, 'index']);
Route::get('delete_task/{id}', [AssignTaskController::class, 'delete']);

Route::get('plan_meeting', [MeetingPlanner::class, 'create_data']);
Route::get('plan_meeting', [MeetingPlanner::class, 'store_data']);
Route::get('plan_meeting_view', [MeetingPlanner::class, 'index']);



Route::get('ajax/request', [EmployeeController::class, 'ajaxRequest'])->name('ajax.request');

Route::post('ajax/request/store', [EmployeeController::class, 'ajaxRequestStore'])->name('ajax.request.store');