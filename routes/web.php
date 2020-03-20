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

Route::get('/', 'PeriodController@index');

// Admin
Route::get('/admin', 'AdminController@index');

// Deadline Manager
Route::get('/deadlines', 'DeadlineController@index');

// Deadline
Route::post('/add-deadline', 'DeadlineController@store');

// Module
Route::post('/add-module', 'ModuleController@store');

// Period
Route::post('/add-period', 'PeriodController@store');

// Teacher
Route::post('/add-teacher', 'TeacherController@store');

// Exam
Route::post('/add-exam', 'ExamController@store');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
