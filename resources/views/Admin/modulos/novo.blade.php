@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('modulos.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Módulos</h1><br>
						@include('Admin.modulos.formModulo')            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
