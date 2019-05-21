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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/mainmap', 'HomeController@all')->name('all.ocorrencia');

Route::get('new', function(){
    return view('new');
})->name('new.ocorrencia');

Route::post('new', 'OcorrenciaController@save')->name('save.ocorrencia');