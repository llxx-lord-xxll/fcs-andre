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

Route::get('/',"AdminPanelController@index");

Route::get('/cpfcs', function () {
    return view('user.login');
});

Route::get('/cpfcs/dashboard', function () {
    return view('user.dashboard');
});

Route::get('/cpfcs/posts', function () {
    return view('user.posts');
});

Route::get('/cpfcs/users', function () {
    return view('user.userman');
});

Route::get('/cpfcs/chapters', function () {
    return view('user.chapterman');
});