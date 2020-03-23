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
    
    Route::get('admin', 'AdminController@index')->name('admin');
    
    Route::resource('module', 'ModuleController')->except([
        'index', 'create', 'show'
    ]);;

    Route::resource('period', 'PeriodController')->except([
        'index', 'create', 'show'
    ]);;

    Route::resource('teacher', 'TeacherController')->except([
        'index', 'create', 'show'
    ]);;

    Route::resource('exam', 'ExamController')->except([
        'index', 'create', 'show'
    ]);
});

Route::resource('deadline', 'DeadlineController')->middleware('role:manager')->except([
    'create', 'show'
]);;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
