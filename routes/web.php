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

Route::post('/'.env('ADMIN_LOGIN','login'),'Deep\LoginController@login');

        Route::group(['middlewareGroups' => ['web']], function() {
            Route::group(['middleware' => ['authrefresh']], function() {
                Route::get('/', function () {
                    return view('welcome');
                });
                Route::get('/logout', 'Deep\LoginController@logout');

                Route::middleware('web')->get('/'.env('ADMIN_LOGIN','login'),'Deep\LoginController@index')->name('login');

                Route::middleware('auth')->prefix('/'.env('ADMIN_PATH','cp'))->group(function () {
                    Route::get('/', function (\Illuminate\Http\Request $request) {
                        return (new \App\Http\Controllers\AdminPanelController())->generate_view($request,'dashboard');
                    })->name('cphome');

                    Route::get('/posts', function (\Illuminate\Http\Request $request) {
                       return (new \App\Http\Controllers\AdminPanelController())->generate_view($request,'posts');
                    })->name('posts');

                    Route::get('/users', function (\Illuminate\Http\Request $request) {
                        return (new \App\Http\Controllers\AdminPanelController())->generate_view($request,'userman');
                    })->name('users');

                    Route::get('/chapters', function (\Illuminate\Http\Request $request) {
                        return (new \App\Http\Controllers\AdminPanelController())->generate_view($request,'dashboard');
                    })->name('chapters');
                });
            });
        });