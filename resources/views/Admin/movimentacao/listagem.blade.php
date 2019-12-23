@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="com-md-6">
        <h3 class="card-title mt-md-2"> Listagem de Entrdas</h3>
      </div>

      <div class="com-md-6 float-md-right search">
        <form action="{{route('routeContatoSearch')}}" method="POST" class="form-inline">
          @csrf
          <div class="input-group input-group-sm">
            <input type="search" placeholder="Consultar" aria-label="Consultar" name="nome" class="form-control form-control-navbar">
            <div class="input-group-append">
              <button type="submit" class="btn btn-navbar"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;" >#ID</th>
          <th class="th-sm" style="width: 200px;" >Contato</th>
          <th class="th-sm" style="width: 100px;" >Condição de Pagamento</th>
          <th class="th-sm" style="width: 70px;" >Tipo</th>
          <th class="th-sm" style="width: 160px;" >Observação</th>
          <th class="text-center" style="width: 70px;" >Valor</th>
          <th class="text-center" style="width: 100px;" >Dt Movimentação</th>
          <th class="text-center" style="width: 80px;" >Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr role="row" class="odd">
          <td class="text-center">{{$item->id}}</td>
          <td class="sorting_1">{{$item->contato}}</td>
          <td>{{$item->condicao_pagamento_id}}</td>
          <td>{{$item->tipo}}</td>
          <td>{{$item->observacao}}</td>
          <td>{{$item->valor}}</td>
          <td>{{$item->movimented_at}}</td>
            <td class="text-center" style="padding: 0.45rem">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ação
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if (Auth::user()->profile == 'Administrador' )
									<a class="dropdown-item" href="{{$item->id}}"
										data-contid="{{$item->id}}"
										data-nome="{{$item->nome}}"
										data-documento="{{$item->documento}}"
										data-endereco="{{$item->endereco}}"
										data-numero="{{$item->numero}}"
										data-telefone="{{$item->telefone}}"
										data-email="{{$item->email}}"
										data-datanascimento="{{$item->datanascimento}}"
										{{-- data-tipocontato="{{$item->tipocontato}}" --}}
										data-status="{{$item->status}}"
										data-cidade="{{$item->cidade}}"
										data-target="#editar"
										data-toggle="modal"> Editar <i class="fa fa-edit"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
                  @endif
                </div>
              </div>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} contatos de um total de {{$consulta->total()}}</p></div>
      @if (isset($contato))
      <div class="col-md-6 pr-4">{{$consulta->appends($contato)->links()}}</div>
      @else
      <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
      @endif
		</div>

		<!-- Modal editar-->
		@include('Admin.contatos.modalEditar')

		{{-- modal Deletar--}}
		@include('Admin.contatos.modalExcluir')
		{{-- Modal --}}
  </div>
</div>
<!-- /.card -->
@push('scripts')
	<script src='{{asset('admin/js/contato/contato.js')}}'></script>
	<script>
		$('.alert').alert()
	</script>
@endpush
@endsection


