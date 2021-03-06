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

use App\Models\Project;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/projects', 'ProjectsController@index')->name('projects.index');
    Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
    Route::post('/projects', 'ProjectsController@store')->name('projects.store');
    Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->name('projects.tasks.store');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();


