<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FullCalendarController@index')->name('index');
Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
Route::post('/event-store', 'EventController@store')->name('routeEventStore');
Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');

// contatos
Route::resource('contato', 'ContatoController');

// user
Route::get('list-user', 'UserController@index')->name('routeUserList');
Route::any('search', 'UserController@search')->name('routeUserSearch');

Auth::routes();

Auth::routes(['verify' => true]);
