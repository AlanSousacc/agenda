@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('tipoevento.update', $tipoevento->id)}}" method="POST">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @csrf
          <div class="panel-body">
            <h1 class="text-center my-4">Cadastrar Tipo de Agendamento</h1>
            @include('Admin.tipoevento.formTipoEvento')
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Modificação</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
