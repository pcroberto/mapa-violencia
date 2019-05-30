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

// Route::get('/', 'HomeController@index')->name('home');

// Route::get('/', 'HomeController@index')->name('home');

Route::post('mainmap', 'HomeController@all')->name('all.ocorrencia');

Route::get('new', function(){
    return view('new');
})->name('new.ocorrencia');

Route::post('novo', 'OcorrenciaController@save')->name('save.ocorrencia');

Route::get('estatistica', 'EstatisticaController@index')->name('estatistica');

Route::post('estatistica', 'EstatisticaController@emitir')->name('emitir.estatistica');

Route::post('login', 'LoginController@efetuar')->name('efetuar.login');

Route::post('cadastrar', 'LoginController@cadastrar')->name('cadastrar.login');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/radar', 'RadarController@index')->name('listar.radar');
Route::get('/radar/novo', 'RadarController@new')->name('novo.radar');
Route::post('/radar/novo', 'RadarController@save')->name('save.radar');
Route::get('/radar/{id}/remover', 'RadarController@remover')->name('remover.radar');

Auth::routes();

