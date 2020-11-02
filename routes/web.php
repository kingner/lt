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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'example'], function () {
    Route::get('/', function () {
        return view('example/child', [
            'name' => '<i>Kingner</i>',
            'data' =>[1,2,3,'a','b','c','一','二','三'] ,
            'records' => []
        ]);
    });

    Route::get('/index', 'Example@index');
});
