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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('entreprise', 'Admin\EntrepriseController')->except([
            'destroy', 'edit'
        ]);

        Route::resource('horaires', 'Admin\HorairesController')->except([
            'destroy', 'edit'
        ]);
    });
});