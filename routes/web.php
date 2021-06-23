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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show/{id}', 'PollController@show');

Route::get('/', 'PollController@index');

// Route::post('/store', 'PollController@store');

Route::post('/store/{poll_id}', 'PollController@store')->middleware('auth');

Route::get('/create', 'PollController@create');

Route::post('/create/create2', 'PollController@create2');

Route::post('/create/create2/optioncreate', 'OptionController@store');