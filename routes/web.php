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

Route::get('/view/greet/{name?}', 'ViewController@greet');
Route::get('/view/layout', 'ViewController@layout');

Route::get('/raw/select', 'RawSqlController@selectUsers');
Route::get('/raw/insert', 'RawSqlController@insertUser');
Route::get('/raw/update', 'RawSqlController@updateUsers');
Route::get('/raw/delete', 'RawSqlController@deleteUsers');

Route::get('/qb/select', 'QueryBuilderController@selectUsers');
Route::get('/qb/insert', 'QueryBuilderController@insertUser');
Route::get('/qb/update', 'QueryBuilderController@updateUsers');
Route::get('/qb/delete', 'QueryBuilderController@deleteUsers');

Route::get('/model/select', 'ModelController@selectUsers');
Route::get('/model/insert', 'ModelController@insertUser');
Route::get('/model/update', 'ModelController@updateUsers');
Route::get('/model/delete', 'ModelController@deleteUsers');
Route::get('/model/relation', 'ModelController@relation');

Route::get('/service/user-api', 'ServiceController@userApiCall');