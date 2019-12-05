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
        <h3 class="card-title mt-md-2"> Listagem de Usuários</h3>
      </div>

      <div class="com-md-6 float-md-right search">
        <form action="{{route('routeUserSearch')}}" method="POST" class="form-inline">
          @csrf
          <div class="input-group input-group-sm">
            <input type="search" placeholder="Consultar" aria-label="Consultar" name="name" class="form-control form-control-navbar">
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
          <th class="th-sm text-center" style="width: 50px;">#ID</th>
          <th class="th-sm" style="width: 150px;">Nome Completo</th>
          <th class="th-sm" style="width: 150px;">Email
          <th class="th-sm" style="width: 120px;">Ultima Atualização</th>
          <th class="th-sm" style="width: 120px;">Perfil</th>
          <th class="th-sm" style="width: 120px;">Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr role="row" class="odd">
          <td class="text-center">{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->updated_at}}</td>
          <td>{{$item->profile}}</td>
          <td class="text-center" style="padding: 0.45rem">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ação
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="http://"> Visualizar  <i class="fa fa-eye"></i></a>
                @if (Auth::user()->profile == 'Administrador' )
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{$item->id}}"
										data-userid="{{$item->id}}"
										data-nome="{{$item->nome}}"
										data-email="{{$item->email}}"
										data-datanascimento="{{$item->email_verified_at}}"
										data-tipocontato="{{$item->password}}"
										data-status="{{$item->profile}}"
										data-target="#editar"
										data-toggle="modal"> Editar <i class="fa fa-edit"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{$item->id}}" data-userid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
                @endif
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} usuários de um total de {{$consulta->total()}}</p></div>
      @if (isset($dataForm))
      <div class="col-md-6 pr-4">{{$consulta->appends($dataForm)->links()}}</div>
      @else
      <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
      @endif
		</div>
		
		<!-- Modal editar-->
		@include('Admin.users.modalEditar')

		{{-- modal Deletar--}}
		@include('Admin.users.modalExcluir')
		{{-- Modal --}}

  </div>
</div>
<!-- /.card -->
@push('scripts')
	<script src='{{asset('admin/js/users/users.js')}}'></script>
	<script>
		$('.alert').alert()
	</script>
@endpush
@endsection


