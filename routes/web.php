<?php
// Verifica se Há login em todas as rotas

use App\Http\Controllers\RelCentroCustoController;

Route::middleware(['auth'])->group(function () {


Route::get('/', 'FullCalendarController@index')->name('index');
Route::get('list-event', 'EventController@index')->name('routeEventList');
Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
Route::post('/event-store', 'EventController@store')->name('routeEventStore');
Route::any('search-event', 'EventController@search')->name('routeEventSearch');
Route::delete('/users-delete/{contato}', 'EventController@delete')->name('routeAgendaDelete');
Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');
Route::get('gerarmovimentacao/agendamento/{id}', 'EventController@show')->name('geramov.agendamento.show');
Route::post('gerarmovimentacao', 'EventController@storeMov')->name('gerarMov.store');

Route::view('sobre', 'Admin.sobre.sobre')->name('sobre');

// contatos
Route::resource('contato', 'ContatoController');
Route::any('search-contato', 'ContatoController@search')->name('routeContatoSearch');

// Somente usuários ISADMIN verão as empresas
Route::middleware(['auth', 'isAdmin'])->group(function () {
  Route::resource('empresa', 'EmpresaController');
  Route::any('search-empresa', 'EmpresaController@search')->name('routeEmpresaSearch');
  Route::post('empresa', 'EmpresaController@store')->name('empresa.store');
});
// Usuários Administradores de Empresa podem editar informações da Própria Empresa
Route::middleware(['auth', 'checkProfile'])->group(function () {
Route::post('minha-empresa', 'EmpresaController@logoUploadPost')->name('routeEmpresaLogo');
Route::get('empresa/minha-conta/{id}', 'EmpresaController@show')->name('empresa.show');
});

// Qualquer usuário listar ou pesquisar usuários de sua própria empresa. E pode atualizar informações do próprio usuário
Route::get('my-account', 'UserController@myAccount')->name('routeUserAccount');
Route::patch('users/{user}/update', 'UserController@updateMyAccount')->name('routeUserUpdateMyAccount');
// Apenas usuários Administradores da Empresa pode inserir novos usuários em sua empresa
Route::middleware(['auth', 'checkProfile'])->group(function () {
	Route::any('search', 'UserController@search')->name('routeUserSearch');
	Route::get('list-user', 'UserController@index')->name('routeUserList');
  Route::patch('users', 'UserController@update')->name('routeUserEdit');
  Route::delete('/users-delete', 'UserController@destroy')->name('routeUserDelete');
});

// movimentacoes
Route::get('movimentacao', 'MovimentacaoController@index')->name('movimentação.index');
Route::middleware(['auth', 'checkProfile'])->group(function () {
  Route::get('movimentacao/create/entrada', 'MovimentacaoController@createIn')->name('movimentacao.createIn');
  Route::get('movimentacao/create/saida', 'MovimentacaoController@createOut')->name('movimentacao.createOut');
  Route::post('movimentacao', 'MovimentacaoController@store')->name('movimentacao.store');
	Route::get('relatorio-mes', 'MovimentacaoController@listagemEntradas')->name('relatorio.mes.atual');
	Route::get('movimentacao/contato/{id}', 'MovimentacaoController@show')->name('movimentacao.contato');
	Route::patch('receber', 'MovimentacaoController@update')->name('receber');
  Route::any('relatorio-periodo-contato', 'MovimentacaoController@relPeriodo')->name('relatorio.periodo.contato');
});

// módulos do sistema
Route::middleware(['auth', 'isAdmin'])->group(function () {
  Route::get('modulos', 'ModuloController@index')->name('modulos.list');
  Route::get('modulos/novo', 'ModuloController@create')->name('modulos.novo');
  Route::post('modulos/salvar', 'ModuloController@store')->name('modulos.store');
  Route::delete('modulos/delete', 'ModuloController@destroy')->name('modulos.destroy');
  Route::get('modulos/edit/{id}', 'ModuloController@edit')->name('modulos.edit');
  Route::put('modulos/update/{id}', 'ModuloController@update')->name('modulos.update');
});

// tipo de evento sistema
Route::get('tipo-evento', 'TipoEventoController@index')->name('tipoevento.list');
Route::middleware(['auth', 'checkProfile'])->group(function () {
  Route::get('tipo-evento/novo', 'TipoEventoController@create')->name('tipoevento.novo');
  Route::post('tipo-evento/salvar', 'TipoEventoController@store')->name('tipoevento.store');
  Route::get('tipo-evento/{id}/editar', 'TipoEventoController@edit')->name('tipoevento.edit');
  Route::put('tipo-evento/update/{id}', 'TipoEventoController@update')->name('tipoevento.update');
  Route::delete('tipo-evento/delete', 'TipoEventoController@destroy')->name('tipoevento.destroy');
});

// centros de custo
Route::get('centrodecusto', 'CentroCustoController@index')->name('cc.list');
Route::middleware(['auth', 'checkProfile'])->group(function () {
  Route::get('centrodecusto/novo', 'CentroCustoController@create')->name('cc.novo');
  Route::post('centrodecusto/salvar', 'CentroCustoController@store')->name('cc.store');
  Route::get('centrodecusto/edit/{id}', 'CentroCustoController@edit')->name('cc.edit');
  Route::put('centrodecusto/update/{id}', 'CentroCustoController@update')->name('cc.update');
  Route::delete('centrodecusto/delete', 'CentroCustoController@destroy')->name('cc.destroy');
	Route::get('movimentacao-centrodecusto', 'CentroCustoController@relatorio')->name('cc.relatorio');
	Route::get('movimentacao/relatorios/cc', 'RelCentroCustoController@relbycc')->name('cc.relbycc');
});

// relacionamento módulos da empresa
Route::middleware(['auth', 'isAdmin'])->group(function () {
	Route::get('modulosempresa/modulos/empresa/{id}', 'AuxModuloEmpresaController@edit')->name('modulosempresa.edit');
	Route::get('modulosempresa/modulos/update/{id}/{empresa}/{status}', 'AuxModuloEmpresaController@update')->name('modulosempresa.update');
});

// access do sistema
Route::get('unauthorized', 'AccessController@index')->name('unauthorized');


});
Auth::routes();
Auth::routes(['verify' => true]);
