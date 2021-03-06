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


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produto', 'produtos@index')->name('produto');
Route::post('/produto','produtos@criar')->name('produto.criar');
Route::post('/produto/{id_produto}','produtos@alterar')->name('produto.alterar');
Route::get('/produto/{id_produto}', 'produtos@index')->name('produto.id');
Route::delete('/produto/{id_produto}','produtos@delete')->name('produto.delete');
Route::get('/venda','vendas@index')->name('venda');
Route::post('/venda/{id_vendendor}','vendas@criar')->name('venda.criar');
Route::get('/relatorio/{id_vendendor}','relatorio@createRelatorio')->name('relatorio');
Route::get('/downloadPDF/{id_venda}','relatorio@downloadPDF');
Route::get('/produto-relatorio','produtos@relatorio')->name('produto.relatorio');
Route::get('/downloadPDF-produtos','produtos@generate');
