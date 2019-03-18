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
Route::get('/selectTest/{id}', 'BlogController@county')->name('county');

Route::get('/', 'BlogController@index')
           ->name('publico.index');

Route::get('/testeBetsy', 'BlogController@testeBesty')
           ->name('publico.index');

Route::get('/testeBetsyJson', 'BlogController@testeBetsyJson')
           ->name('publico.index');

Route::get('/testeSecondBetsy', 'BlogController@testeSecondBetsy')
           ->name('publico.index');

//Route::get('/login', 'PublicoController@login');

/*Route to search*/
Route::get('/search', 'BlogController@search');

Route::get('/test', 'BlogController@test');

/*
Crear logs en un archivo
Route::get('test', function() {
    try {
        //La variable no existe
        return $test_var;
    } catch (\Exception $e){
        //Almacenamos la informacion del error
        \log::debug('Test var fails' . $e->getMessage());
    }
});
*/

Route::get('error', function() {
    abort(500);
});





//Route::post('/store', 'BlogController@store')
//            ->name('blog.store');

Route::resource('Blog', 'BlogController');
            
Auth::routes();

Route::get('/home', 'HomeController@index');
