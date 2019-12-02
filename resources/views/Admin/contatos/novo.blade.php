@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('routeContatoStore')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Contato</h1><br>
            @include('Admin.contatos.formContato')
            <input type="submit" name="submit" class="btn-alt btn btn-success btn-sm" value="Cadastrar" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
