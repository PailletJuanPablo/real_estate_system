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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/client_status', 'ClientStatusController@index')->name('client_status');
Route::get('/client_status/form/{id?}', 'ClientStatusController@createOrUpdate')->name('client_status/form');
Route::post('/client_status/form', 'ClientStatusController@createOrUpdate')->name('client_status/form');
Route::post('/client_status/delete/{id}', 'ClientStatusController@delete')->name('client_status/delete');


Route::get('/clients', 'ClientsController@index')->name('clients');
Route::get('/clients/form/{id?}', 'ClientsController@createOrUpdate')->name('clients/form');
Route::post('/clients/form', 'ClientsController@createOrUpdate')->name('clients/form');
Route::post('/clients/delete/{id}', 'ClientsController@delete')->name('clients/delete');

Route::get('/schedules', 'SchedulesController@index')->name('schedules');
Route::get('/schedules/form/{id?}', 'SchedulesController@createOrUpdate')->name('schedules/form');
Route::post('/schedules/form', 'SchedulesController@createOrUpdate')->name('schedules/form');
Route::post('/schedules/delete/{id}', 'SchedulesController@delete')->name('schedules/delete');

Route::get('/schedules_types', 'ScheduleTypeController@index')->name('schedules_types');
Route::get('/schedules_types/form/{id?}', 'ScheduleTypeController@createOrUpdate')->name('schedules_types/form');
Route::post('/schedules_types/form', 'ScheduleTypeController@createOrUpdate')->name('schedules_types/form');
Route::post('/schedules_types/delete/{id}', 'ScheduleTypeController@delete')->name('schedules_types/delete');

