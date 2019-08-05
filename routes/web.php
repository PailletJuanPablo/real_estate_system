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

Route::get('/event_types', 'EventTypeController@index')->name('event_types');
Route::get('/event_types/form/{id?}', 'EventTypeController@createOrUpdate')->name('event_types/form');
Route::post('/event_types/form', 'EventTypeController@createOrUpdate')->name('event_types/form');
Route::post('/event_types/delete/{id}', 'EventTypeController@delete')->name('event_types/delete');

Route::get('/processes', 'ProcessController@index')->name('processes');
Route::get('/processes/form/{id?}', 'ProcessController@createOrUpdate')->name('processes/form');
Route::post('/processes/form', 'ProcessController@createOrUpdate')->name('processes/form');
Route::post('/processes/delete/{id}', 'ProcessController@delete')->name('processes/delete');

Route::get('/contacts', 'EventsController@index')->name('contacts');
Route::get('/contacts/form/{id?}', 'EventsController@createOrUpdateContact')->name('contacts/form');
Route::post('/contacts/form', 'EventsController@createOrUpdateContact')->name('contacts/form');
Route::post('/contacts/delete/{id}', 'EventsController@delete')->name('contacts/delete');

Route::get('/properties_schedules', 'EventsController@index')->name('properties_schedules');
Route::get('/properties_schedules/form/{id?}', 'EventsController@createOrUpdatePropertyShow')->name('properties_schedules/form');
Route::post('/properties_schedules/form', 'EventsController@createOrUpdatePropertyShow')->name('properties_schedules/form');
Route::post('/properties_schedules/delete/{id}', 'EventsController@delete')->name('properties_schedules/delete');

Route::get('/clients_status/{status_id}', 'ClientsController@getByStatus')->name('clients_status');



