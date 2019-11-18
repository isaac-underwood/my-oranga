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

//GET Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/compare', 'ComparisonController@showCompare')->middleware('auth')->name('compare');
Route::get('/calendar', 'ActivityController@calendar')->middleware('auth')->name('calendar');
Route::get('/entries', 'PagesController@entries')->middleware('auth')->name('entries');
Route::get('/results', 'PagesController@results')->middleware('auth')->name('results');

//RESOURCE Routes
Route::resource('/activities', 'ActivityController')->middleware('auth');
Route::resource('/alcohol', 'AlcoholController')->middleware('auth');
Route::resource('/moods', 'MoodController')->middleware('auth');
Route::resource('/sleep', 'SleepController')->middleware('auth');
Route::resource('/snacks', 'SnackController')->middleware('auth');
Route::resource('/targets', 'TargetController')->middleware('auth');
Route::resource('/weights', 'WeightController')->middleware('auth');
