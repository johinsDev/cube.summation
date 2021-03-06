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

Route::get('/', [
    'uses' => 'CubeController@home',
    'as'   => 'home'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

/* CUBE WITH SESSIOn */

Route::post('/init' , [
    'uses' => 'CubeController@init',
    'as'   => 'init.cube'
]);

Route::post('/create' , [
   'uses' => 'CubeController@create',
    'as'  =>  'cube.create'
]);

Route::post('/update' , [
    'uses' => 'CubeController@update',
    'as'  =>  'cube.update'
]);

Route::post('/query' , [
    'uses' => 'CubeController@query',
    'as'  =>  'cube.query'
]);