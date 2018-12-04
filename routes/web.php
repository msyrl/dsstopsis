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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
	return redirect()->route('criteria.index');
});

Route::prefix('alternative')->name('alternative.')->group(function(){
	Route::get('', 'AlternativeController@index')->name('index');
	Route::get('create', 'AlternativeController@create')->name('create');
	Route::post('', 'AlternativeController@store')->name('store');
	Route::get('{alternative}', 'AlternativeController@show')->name('show');
	Route::put('{alternative}', 'AlternativeController@update')->name('update');
	Route::delete('{alternative}', 'AlternativeController@destroy')->name('destroy');
});

Route::prefix('criteria')->name('criteria.')->group(function(){
	Route::get('', 'CriteriaController@index')->name('index');
	Route::get('create', 'CriteriaController@create')->name('create');
	Route::post('', 'CriteriaController@store')->name('store');
	Route::get('{criteria}', 'CriteriaController@show')->name('show');
	Route::put('{criteria}', 'CriteriaController@update')->name('update');
	Route::delete('{criteria}', 'CriteriaController@destroy')->name('destroy');
});

Route::prefix('score')->name('score.')->group(function(){
	Route::get('', 'ScoreController@index')->name('index');
	Route::get('create', 'ScoreController@create')->name('create');
	Route::post('', 'ScoreController@store')->name('store');
	Route::get('{alternative}', 'ScoreController@show')->name('show');
	Route::put('{alternative}', 'ScoreController@update')->name('update');
	Route::delete('{alternative}', 'ScoreController@destroy')->name('destroy');
});

Route::prefix('scoring')->name('scoring.')->group(function(){
	Route::get('', 'ScoringController@index')->name('index');
});