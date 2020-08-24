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

Route::post('/storeItem', 'MainController@storeItem');
Route::get('/getItems', 'MainController@getItems');
Route::delete('/deleteItem/{id}', 'MainController@deleteItem');
Route::put('/editItem/{id}', 'MainController@editItem');