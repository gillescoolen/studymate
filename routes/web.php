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

// Admin
Route::get('admin', 'AdminController@index')->name('admin');;

// Deadline Manager
Route::get('/deadlines', 'DeadlineController@index');

// Deadline
Route::post('deadline/create', 'DeadlineController@store');
Route::patch('deadline/{id}/update', 'DeadlineController@update')->name('update-deadline');
Route::delete('deadline/{id}/destroy', 'DeadlineController@destroy')->name('delete-deadline');

// Module
Route::resource('module', 'ModuleController');

// Period
Route::resource('period', 'PeriodController');

// Teacher
Route::resource('teacher', 'TeacherController');

// Exam
Route::resource('exam', 'ExamController');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
