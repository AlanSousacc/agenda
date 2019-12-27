@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
  <div class="row mb-4" >
    <div class="col-md-12">
      <a href="#" class="btn btn-outline-success btn-lg float-right mr-3" title="Relatório por periodo e/ou contato" data-target="#personalizado" data-toggle="modal">Período e/ou Contato <i class="fa fa-calendar"></i></a>
      <a href="{{route('relatorio-mes-atual')}}" target="_blank" class="btn btn-outline-success btn-lg float-right mr-3">Mês Atual <i class="fa fa-file-pdf"></i></a>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="com-md-6">
        <h3 class="card-title mt-md-2"> Listagem de Movimentação</h3>
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
          {{-- <th class="text-center" style="width: 50px;" >#ID</th> --}}
          <th class="text-center" style="width: 150px;" >Contato</th>
          <th class="text-center" style="width: 160px;" >Condição de Pagamento</th>
          <th class="text-center" style="width: 70px;" >Tipo</th>
          <th class="text-center" style="width: 150px;" >Observação</th>
          <th class="text-center" style="width: 80px;" >Valor</th>
          <th class="text-center" style="width: 70px;" >Dt Movimentação</th>
          <th class="text-center" style="width: 80px;" >Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr role="row" class="odd">
          {{-- <td class="text-center">{{$item->id}}</td> --}}
          <td class="text-center">{{$item->contato->nome}}</td>
          <td class="text-center">{{$item->condicao_pagamento->nome}}</td>
          <td class="text-center" alt="entrada" title="Entrada"><i class="fa fa-arrow-alt-circle-up" style="color: #009908"></i></td>
          <td class="text-center">{{$item->observacao}}</td>
          <td class="text-center">R$ {{number_format($item->valor, 2, ',', '.')}}</td>
          <td class="text-center">{{Carbon\Carbon::parse($item->movimented_at)->format('d/m/Y H:i:s')}}</td>
            <td class="text-center" style="padding: 0.45rem">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ação
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @if (Auth::user()->profile == 'Administrador' )
									<a class="dropdown-item" href="{{$item->id}}"
										data-movid="{{$item->id}}"
										data-contato="{{$item->contato->nome}}"
										data-pagamento="{{$item->condicao_pagamento->nome}}"
										{{-- data-tipo="{{$item->tipo}}" --}}
										data-observacao="{{$item->observacao}}"
										data-valor="{{$item->valor}}"
										data-movimented_at="{{$item->movimented_at}}"
										data-target="#visualizar"
										data-toggle="modal"> Visualiar <i class="fa fa-edit"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
                  @endif
                </div>
              </div>
            </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td class="text-center" colspan="4"></td>
          <td class="text-center" style="font-weight:600">Total R$ {{number_format($total, 2, ',', '.')}}</td>
          <td class="text-center" colspan="2"></td>
        </tr>
      </tfoot>
    </table>
    <div class="row">
      <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} movimentações de um total de {{$consulta->total()}}</p></div>
      @if (isset($contato))
      {{-- <div class="col-md-6 pr-4">{{$consulta->appends($contato)->links()}}</div> --}}
      @else
      <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
      @endif
		</div>

		{{-- adicionar --}}
		@include('Admin.movimentacao.modalNovo')
		<!-- Modal editar-->
		@include('Admin.movimentacao.modalVisualizar')

		{{-- modal Deletar--}}
		@include('Admin.movimentacao.modalExcluir')
		{{-- Modal --}}

  </div>
  <div class="row" >
    <div class="col-md-12">
      <button class="btn btn-outline-danger btn-lg float-right" disabled>Nova Baixa</button>
      <button class="btn btn-outline-success btn-lg float-right mr-3" data-target="#novo" data-toggle="modal">Nova Entrada</button>
    </div>
  </div>
</div>
<!-- /.card -->
@push('scripts')
  <script src='https://cdnjs.com/libraries/jquery.mask'></script>
  <script src='{{asset('admin/js/movimentacao/movimentacao.js')}}'></script>
  <script>
    $(document).ready(function () {
      $('#valor').mask('000.000.000.000.000,00');
    });
  </script>
@endpush
@endsection



