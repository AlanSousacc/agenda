<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FullCalendarController@index')->name('index');
Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
Route::post('/event-store', 'EventController@store')->name('routeEventStore');
Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');
Route::any('search-event', 'EventController@search')->name('routeEventSearch');
Route::get('list-event', 'EventController@index')->name('routeEventList');
Route::delete('/users-delete/{contato}', 'EventController@delete')->name('routeAgendaDelete');

// contatos
Route::resource('contato', 'ContatoController');
Route::any('search-contato', 'ContatoController@search')->name('routeContatoSearch');

// empresa
Route::resource('empresa', 'EmpresaController');
Route::any('search-empresa', 'EmpresaController@search')->name('routeEmpresaSearch');
Route::post('minha-empresa', 'EmpresaController@logoUploadPost')->name('routeEmpresaLogo');
Route::post('empresa', 'EmpresaController@store')->name('empresa.store');

// user
Route::get('list-user', 'UserController@index')->name('routeUserList');
Route::any('search', 'UserController@search')->name('routeUserSearch');
Route::get('my-account', 'UserController@myAccount')->name('routeUserAccount');
Route::patch('users/{user}/update', 'UserController@updateMyAccount')->name('routeUserUpdateMyAccount');
Route::patch('users', 'UserController@update')->name('routeUserEdit');
Route::delete('/users-delete', 'UserController@destroy')->name('routeUserDelete');

// movimentacoes
Route::get('movimentacao', 'MovimentacaoController@index');

Auth::routes();

Auth::routes(['verify' => true]);
