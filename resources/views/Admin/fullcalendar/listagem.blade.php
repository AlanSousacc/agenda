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
      <div class="row">
        <div class="col-md-3">
          <h3 class="card-title mt-md-4"> Listagem de Agendamentos</h3>
        </div>
        <div class="col-md-9 search float-md-right">
          <a href="http://" data-target="#filtroagendamento" data-toggle="modal" class="btn btn-success float-md-right">Filtrar <i class="fa fa-filter"></i></a>
        </div>
      </div>

    </div>

    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="text-center">Contato</th>
          <th class="text-center">Tipo Agendamento</th>
          <th class="text-center">Data/Hora inicio</th>
          <th class="text-center">Data/Hora Final</th>
          <th class="text-center">Descrição</th>
          <th class="text-center">Cor</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr role="row" class="odd">
          <td class="text-center">{{$item->contato->nome}}</td>
          <td class="text-center">{{$item->title}}</td>
          <td class="text-center">{{Carbon\Carbon::parse($item->start)->format('d/m/Y H:m:i')}}</td>
          <td class="text-center">{{Carbon\Carbon::parse($item->end)->format('d/m/Y H:m:i')}}</td>
          <td class="text-center">{{$item->description}}</td>
          <td class="text-center"><i class="fa fa-circle" style="color:{{$item->color}}"></i></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} agendamento(s) de um total de {{$consulta->total()}}</p></div>
        @if (isset($evento))
        <div class="col-md-6 pr-4">{{$consulta->appends($evento)->links()}}</div>
        @else
        <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
        @endif
      </div>
    </div>
    {{-- modal filtro--}}
    @include('Admin.fullcalendar.modalfiltro')
  </div>
  <!-- /.card -->
  @push('scripts')
  <script src='{{asset('admin/js/agenda/agenda.js')}}'></script>
  {{-- <script src='{{asset('assets/fullcalendar/js/agendamento.js')}}'></script> --}}
  @endpush
  @endsection



