@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('empresa.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Empresa</h1><br>
            @include('Admin.empresa.formEmpresa')
            <input type="submit" name="submit" class="btn-alt btn btn-success btn-sm" value="Cadastrar" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
