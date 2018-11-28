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

Route::get('/', 'PublicoController@index')
            ->name('publico.index');

Route::get('/login', 'PublicoController@login')
            ->name('publico.login');

Route::post('/createuser', 'UserControler@storage')
            ->name('user.create');

