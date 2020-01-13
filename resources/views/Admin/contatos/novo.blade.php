@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('contato.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Contato</h1><br>
            @include('Admin.contatos.formContato')            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
