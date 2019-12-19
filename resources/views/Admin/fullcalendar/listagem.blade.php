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
        <div class="col-md-5">
          <h3 class="card-title mt-md-4"> Listagem de Agendamentos</h3>
        </div>
        <div class="col-md-7 search float-md-right">
          <form action="{{route('routeEventSearch')}}" method="POST" class="form-inline float-md-right ">
            @csrf
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="start">Dt. Inicial</label>
                    <input type="date" class="form-control start" id="start" value="{{old('start')}}" name="start">
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="end">Dt. Final</label>
                    <input type="date" class="form-control end" id="end" value="{{old('end')}}" name="end">
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="documento">Contato</label>
                  <select class="form-control contato_id" id="contato_id" name="contato_id" {{old('contato_id')}}>
                    <option selected disabled>Selecione um contato para consultar</option>
                    @foreach ($contato as $item)
                    <option value="{{$item->id}}">{{$item->nome}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group mt-4 float-md-right">
                  <button type="submit" class="btn btn-success"> Pesquisar <i class="fa pl-2 fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>

    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="text-center" style="width: 150px;" >Cliente</th>
          <th class="text-center" style="width: 200px;" >Título</th>
          <th class="text-center" style="width: 200px;" >Data/Hora inicio</th>
          <th class="text-center" style="width: 200px;" >Data/Hora Final</th>
          <th class="text-center" style="width: 150px;" >Descrição</th>
          <th class="text-center" style="width: 120px;" >Opções</th>
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
          <td class="text-center" style="padding: 0.45rem">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ação
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if (Auth::user()->profile == 'Administrador' )
                <a class="dropdown-item" href="{{$item->id}}"
                  data-agenid="{{$item->id}}"
                  data-title="{{$item->title}}"
                  data-start="{{Carbon\Carbon::parse($item->start)->format('d/m/Y hh:mm')}}"
                  data-end="{{Carbon\Carbon::parse($item->end)->format('d/m/Y hh:mm')}}"
                  data-description="{{$item->description}}"
                  data-contato="{{$item->nome}}"
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
      <div class="row">
        <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} agendamento(s) de um total de {{$consulta->total()}}</p></div>
        @if (isset($evento))
        <div class="col-md-6 pr-4">{{$consulta->appends($evento)->links()}}</div>
        @else
        <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
        @endif
      </div>

      <!-- Modal editar-->
      @include('Admin.fullcalendar.modaleditar')

      {{-- modal Deletar--}}
      @include('Admin.fullcalendar.modalExcluir')
      {{-- Modal --}}
    </div>
  </div>
  <!-- /.card -->
  @push('scripts')
  <script src='{{asset('admin/js/agenda/agenda.js')}}'></script>
  @endpush
  @endsection



