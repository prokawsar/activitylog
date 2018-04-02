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
    if(Auth::check()){
        return view('home');
    }
    return view('auth.login');
})->name('home');

Auth::routes();

Route::post('/savelog', 'ActivityController@saveLog')->name('savelog');
Route::post('/addactivity', 'ActivityController@addActivity')->name('addactivity');
Route::get('/enable{id}', 'ActivityController@enableActivity')->name('enable');
Route::get('/mylog', function (){
    return view('log');
})->name('mylog');

Route::get('/disable{id}', 'ActivityController@disableActivity')->name('disable');

//Route::get('/home', 'HomeController@index')->name('home');
