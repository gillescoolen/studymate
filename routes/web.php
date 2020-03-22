<?php

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

Auth::routes();

Route::get('/', 'PeriodController@index')->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {
    // Admin
    Route::get('admin', 'AdminController@index')->name('admin');
    
    // Module
    Route::resource('module', 'ModuleController');

    // Period
    Route::resource('period', 'PeriodController');

    // Teacher
    Route::resource('teacher', 'TeacherController');

    // Exam
    Route::resource('exam', 'ExamController');
});


// Deadline
Route::resource('deadline', 'DeadlineController')->middleware('role:manager');


// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
