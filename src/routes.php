<?php
/**
 * Here this package routes ...
 * If you want to override this then you need to define route of
 * - todo/index
 * - todo/create
 * - todo/store
 * - todo/reset-status
 * User: toni
 * Date: 10/10/14
 * Time: 13:14
 */
Route::get("todo", 'Panatau\MyAppToDo\Controllers\AppTodoController@index');
Route::get("todo/index", ['as'=>'todo/index', 'uses'=>'Panatau\MyAppToDo\Controllers\AppTodoController@index']);
Route::get("todo/create", ['as'=>'todo/create', 'uses'=>'Panatau\MyAppToDo\Controllers\AppTodoController@create']);
Route::post("todo/create", ['as'=>'todo/store', 'uses'=>'Panatau\MyAppToDo\Controllers\AppTodoController@store']);
Route::get("todo/reset-status/{id}", ['as'=>'todo/reset-status', 'uses'=>'Panatau\MyAppToDo\Controllers\AppTodoController@resetStatus']);
Route::post("todo/reset-status/{id}", ['as'=>'todo/reset-status', 'uses'=>'Panatau\MyAppToDo\Controllers\AppTodoController@resetStatus']);
