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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/projects', 'Project\ProjectController@index');
Route::get('/projects/new', 'Project\ProjectController@create');
Route::post('/projects/new', 'Project\ProjectController@save');

Route::get('/servers/{projectId}', 'Server\ServerController@index');
Route::get('/servers/{projectId}/new/{serverId?}', 'Server\ServerController@create');
Route::post('/servers/{projectId}/new/{serverId?}', 'Server\ServerController@save');


Route::get('/recipes/{projectId}/{recipeId?}', 'Recipe\RecipeController@index');
Route::post('/recipes/{projectId}/save/{recipeId?}', 'Recipe\RecipeController@save');
Route::post('/recipes/{projectId}/addTask', 'Recipe\RecipeController@addTask');
Route::post('/recipes/{projectId}/orderTask', 'Recipe\RecipeController@orderTask');
Route::get('/recipes/{projectId}/delTask/{taskId}', 'Recipe\RecipeController@delTask');
