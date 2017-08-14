<?php

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

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'TimerController@index');

    Route::resource('/timers', 'TimerController', ['except' => ['index']]);
    Route::resource('/groups', 'GroupController');
});

Auth::routes();
