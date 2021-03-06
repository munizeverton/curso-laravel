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

Route::get('client', 'ClientController@index');
Route::post('client', 'ClientController@store');
Route::get('client/{id}', 'ClientController@show');
Route::delete('client/{id}', 'ClientController@destroy');
Route::put('client/{id}', 'ClientController@update');


Route::get('project/{id}/members', 'ProjectMembersController@index');


Route::get('project/{id}/note', 'ProjectNoteController@index');
Route::post('project/{id}/note', 'ProjectNoteController@store');
Route::get('project/{projectId}/note/{noteId}', 'ProjectNoteController@show');
Route::delete('project/{projectId}/note/{noteId}', 'ProjectNoteController@destroy');
Route::put('project/{projectId}/note/{noteId}', 'ProjectNoteController@update');


Route::get('project/{id}/tasks', 'ProjectTaskController@index');
Route::post('project/{id}/tasks', 'ProjectTaskController@store');
Route::get('project/{projectId}/tasks/{taskId}', 'ProjectTaskController@show');
Route::delete('project/{projectId}/tasks/{taskId}', 'ProjectTaskController@destroy');
Route::put('project/{projectId}/tasks/{taskId}', 'ProjectTaskController@update');


Route::get('project', 'ProjectController@index');
Route::post('project', 'ProjectController@store');
Route::get('project/{id}', 'ProjectController@show');
Route::delete('project/{id}', 'ProjectController@destroy');
Route::put('project/{id}', 'ProjectController@update');
