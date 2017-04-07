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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register','RegistrationController@register');
Route::post('/register','RegistrationController@postRegister');
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@postLogin');
Route::post('/logout','LoginController@logout');