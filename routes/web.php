<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/Publicaciones', 'App\Http\Controllers\desafioController@Publicar');
Route::post('/Publicaciones', 'App\Http\Controllers\desafioController@postPublicar');
Route::get('/Login', 'App\Http\Controllers\loginController@Login');
Route::post('/Login', 'App\Http\Controllers\loginController@postLogin')->name('login');
Route::get('/register', 'App\Http\Controllers\loginController@Register');
Route::post('/register', 'App\Http\Controllers\loginController@postRegister');
Route::get('/VerPublicaciones', 'App\Http\Controllers\desafioController@verPublicaciones');
Route::get('/Visualizar/{id}', 'App\Http\Controllers\desafioController@Visualizar');
Route::post('/Visualizar/{id}', 'App\Http\Controllers\desafioController@Publicar_Comentario');
Route::get('/Comentarios/{id}', 'App\Http\Controllers\desafioController@ObtenerComentario');



