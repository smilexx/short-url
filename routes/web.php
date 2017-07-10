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

Route::get('/home', function () {
    return redirect('create');
});

Route::get('/', function () {
    return redirect('login');
});

Route::get('/:short_url', function ($short_url) {

});

Auth::routes();

Route::get('/create', 'PageController@createUrl')->name('create_short_url')->middleware('auth');
