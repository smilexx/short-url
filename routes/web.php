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
    return view('home');
});



Route::get('/{short_url}', 'ShortUrlController@index');




Route::group(['prefix' => 'panel'], function () {
    Route::get('/create', 'PageController@createUrl')->name('create_short_url')->middleware('auth');

    Route::get('/not-found', function () {
        return view('not-found');
    });

    Route::get('/home', function () {
        return redirect('/');
    });


    Auth::routes();
});

Route::group(['middleware' => ['auth'], 'prefix' => 'api'], function () {
    Route::resource('short-url', 'Api\ShortUrlApiController', ['only' => [
        'index', 'store', 'destroy'
    ]]);
});
