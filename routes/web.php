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
Route::get('admin', 'AdminController@index');

// Deadline Manager
Route::get('/deadlines', 'DeadlineController@index');

// Deadline
Route::post('deadline/create', 'DeadlineController@store');
Route::patch('deadline/{id}', 'DeadlineController@update')->name('update-deadline');
Route::delete('deadline/{id}', 'DeadlineController@destroy')->name('delete-deadline');

// Module
Route::get('module/{id}/edit', 'ModuleController@edit');
Route::get('module/create', 'ModuleController@create');
Route::post('module/add', 'ModuleController@store');
Route::post('module/{id}/update', 'ModuleController@update')->name('update-module');

// Route::prefix('module')->namespace('Module')->group(function() {
//     Route::get('add', 'ModuleController@store')->name('add');
// });


// Period
Route::post('period/add', 'PeriodController@store');
Route::post('period/{id}/destroy', 'PeriodController@destroy')->name('delete-period');

// Teacher
Route::post('teacher/add', 'TeacherController@store');

// Exam
Route::post('exam/add', 'ExamController@store');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
