<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
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
    return view('auth.login');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', DashboardController::class)->name('admin.dashboard');

    Route::resource('teacher', TeacherController::class, ['as' => 'admin']);
    Route::resource('user', UserController::class, ['as' => 'admin']);
    Route::resource('role', RoleController::class, ['as' => 'admin']);
    Route::resource('semester', SemesterController::class, ['as' => 'admin']);

});

require __DIR__ . '/auth.php';
