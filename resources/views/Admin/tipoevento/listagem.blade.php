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
        <h3 class="card-title mt-md-2"> Listagem de Tipo de Evento</h3>
        </div>
      </div>
      <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="text-center" style="width:50px">#ID</th>
            <th class="text-center" style="width:50px">Status</th>
            <th class="text-center" style="width:250px">Descrição</th>
            <th class="text-center" style="width:50px">Opções</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($consulta as $item)
          <tr role="row" class="odd">
            <td class="text-center">{{$item->id}}</td>
            <td class="text-center">
              @if ( $item->status == 1)
              <i class="fa fa-check-circle" style="color:green"></i>
              @else
              <i class="fa fa-times-circle" style="color:red"></i>
              @endif
            </td>
            <td>{{$item->titulo}}</td>
            <td class="text-center" style="padding: 0.45rem">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ação
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('tipoevento.edit', $item->id)}}"><i class="fa fa-edit"></i> Editar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{$item->id}}" data-tipeveid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

        {{-- modal Deletar --}}
        @include('Admin.tipoevento.modalExcluir')

        <div class="card-footer">
          <div class="col-md-6 offset-md-4 float-right">
            <a class="btn btn-primary float-right" href="{{ route('tipoevento.novo') }}" role="button">Novo Tipo Evento</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
    @push('scripts')
    <script src='{{asset('admin/js/tipoevento/tipoevento.js')}}'></script>
    @endpush


    @endsection



