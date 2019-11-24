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
Route::get('/produto', 'produtos@index')->name('produto');
Route::post('/produto',['as'=>'criar','uses'=>'produtos@criar']);
Route::put('/produto',['as'=>'alterar','uses'=>'produtos@alterar']);

