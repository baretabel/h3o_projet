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
Route::get('/home', 'MainController@home')->name('home');
Route::post('/nouv', 'MainController@nouv_projet')->name('nouv');
Route::post('/comp', 'MainController@competence')->name('comp');
Route::post('/mat', 'MainController@materiel')->name('mat');
Route::post('/act', 'MainController@acteur')->name('act');
Route::post('/terr', 'MainController@territoire')->name('terr');
Route::get('/v2/home', 'SecondController@home')->name('form');
Route::post('/v2/nouv', 'SecondController@nouv_projet')->name('new');
Route::post('/v2/comp', 'SecondController@competence')->name('com');

Route::get('/dashboard', 'AdminController@home')->name('admin');
Route::get('/', 'MainController@index');
