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

Route::group(['middleware' => [\App\Http\Middleware\CheckAge::class]], function(){

    Route::get('/hello-world', function(){
        return 'Hello world!';
    });

    Route::get('/hello/{name?}', function($name = 'Guest'){
        return "Hello {$name}!";
    })->where('name', '[A-Z][a-z]+');

    Route::post('/post', function(){
        return 'Hello world!';
    });

});

Route::get('/goodbye-world', 'DummyController@goodbyeWorld');
Route::get('/goodbye/{name?}', 'DummyController@sayGoodbye');
Route::get('/redirect', 'DummyController@redirectToGoodbyeWorld');
Route::get('/redirect/target/{name?}', 'DummyController@redirectTarget')->name('target');