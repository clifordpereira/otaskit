<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);

    Route::get('/tasks/start_task/{task}', [TaskController::class, 'startTask']);
    Route::get('/tasks/end_task/{task}', [TaskController::class, 'endTask']);
    Route::resource('tasks', TaskController::class);
});
