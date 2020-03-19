<?php

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
Route::get('/', 'PeriodController@index');

// Admin
Route::get('/admin', 'AdminController@index');

// Module
Route::post('/add-module', 'ModuleController@store');

// Period
Route::post('/add-period', 'PeriodController@store');

// Teacher
Route::post('/add-teacher', 'TeacherController@store');

// Exam
Route::post('/add-exam', 'ExamController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
