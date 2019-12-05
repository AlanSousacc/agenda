<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FullCalendarController@index')->name('index');
Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
Route::post('/event-store', 'EventController@store')->name('routeEventStore');
Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');

// contatos
// Route::get('list-contato', 'ContatoController@index')->name('routeContatoList');
Route::any('search-contato', 'ContatoController@search')->name('routeContatoSearch');
// Route::get('contato', 'ContatoController@create')->name('routeContatoNovo');
// Route::post('list-contato', 'ContatoController@store')->name('routeContatoStore');
// Route::delete('excluir-contato', 'ContatoController@delete')->name('routeContatoDelete');
// Route::put('/editar-contato', 'ContatoController@update')->name('routeContatoUpdate');

Route::resource('contato', 'ContatoController');

// user
Route::get('list-user', 'UserController@index')->name('routeUserList');
Route::any('search', 'UserController@search')->name('routeUserSearch');
Route::get('my-account', 'UserController@myAccount')->name('routeUserAccount');
Route::patch('users/{user}/update', 'UserController@updateMyAccount')->name('routeUserUpdateMyAccount');
Route::patch('users', 'UserController@update')->name('routeUserEdit');
Route::delete('/users-delete', 'UserController@destroy')->name('routeUserDelete');

Auth::routes();

Auth::routes(['verify' => true]);
