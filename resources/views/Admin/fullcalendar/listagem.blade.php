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
        <h3 class="card-title mt-md-2"> Listagem de Agendamentos</h3>
      </div>

      <div class="com-md-6 float-md-right search">
        <form action="{{route('routeEventSearch')}}" method="POST" class="form-inline">
          @csrf
          <div class="input-group input-group-sm">
            <input type="search" placeholder="Consultar Razão Social" aria-label="Consultar" name="razaosocial" class="form-control form-control-navbar">
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
          <th class="th-sm" style="width: 200px;" >Título</th>
          <th class="th-sm" style="width: 200px;" >Data/Hora inicio</th>
          <th class="th-sm" style="width: 200px;" >Data/Hora Final</th>
          <th class="th-sm" style="width: 150px;" >Descrição</th>
          {{-- <th class="th-sm" style="width: 120px;" >Conatato</th> --}}
          <th class="text-center" style="width: 120px;" >Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr role="row" class="odd">
          <td class="text-center">{{$item->title}}</td>
          <td class="sorting_1">{{$item->start}}</td>
          <td>{{$item->end}}</td>
          <td>{{$item->description}}</td>
          {{-- <td>{{$item->contato->nome}}</td> --}}
            <td class="text-center" style="padding: 0.45rem">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ação
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if (Auth::user()->profile == 'Administrador' )
                  <div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{$item->id}}"
										data-agenid="{{$item->id}}"
										data-title="{{$item->title}}"
										data-start="{{$item->start}}"
										data-end="{{$item->end}}"
										data-description="{{$item->description}}"
										data-nome="{{$item->nome}}"
										data-target="#editar"
										data-toggle="modal"> Editar <i class="fa fa-edit"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{$item->id}}" data-agenid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
                  @endif
                </div>
              </div>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{-- <div class="row">
      <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} agendamento(s) de um total de {{$consulta->total()}}</p></div>
      @if (isset($empresas))
      <div class="col-md-6 pr-4">{{$consulta->appends($empresas)->links()}}</div>
      @else
      <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
      @endif
		</div> --}}

		<!-- Modal editar-->
		@include('Admin.fullcalendar.modaleditar')

		{{-- modal Deletar--}}
		@include('Admin.fullcalendar.modalExcluir')
		{{-- Modal --}}
  </div>
</div>
<!-- /.card -->
@push('scripts')
	<script src='{{asset('admin/js/empresa/empresa.js')}}'></script>
@endpush
@endsection



