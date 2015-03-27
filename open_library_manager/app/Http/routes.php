<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

//Route::get('authors/crud', 'AuthorsController@crud');

Route::resource('authors', 'AuthorsController');
Route::get('authors/{id}/destroy', ['uses' =>'AuthorsController@destroy']);
Route::post('authors/{id}', ['uses' =>'AuthorsController@update']);

Route::resource('titles', 'TitlesController');
Route::get('titles/{id}/destroy', ['uses' =>'TitlesController@destroy']);
Route::post('titles/{id}', ['uses' =>'TitlesController@update']);
