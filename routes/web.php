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

Route::get('/', 'BlogController@index')
           ->name('publico.index');

//Route::get('/login', 'PublicoController@login');

/*Route to search*/
Route::get('/search', 'BlogController@search');

Route::get('/test', 'BlogController@test');







//Route::post('/store', 'BlogController@store')
//            ->name('blog.store');

Route::resource('Blog', 'BlogController');
            
Auth::routes();

Route::get('/home', 'HomeController@index');
