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

Route::get('/', 'OcorrenciaController@all')->name('all.ocorrencia');

Route::get('/new', 'OcorrenciaController@index')->name('new.ocorrencia');