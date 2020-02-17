@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form enctype="multipart/form-data" action="{{route('empresa.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center my-3">Nova Empresa</h1>
            @include('Admin.empresa.formEmpresa')
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="submit" class="btn-alt btn btn-success btn-sm" value="Cadastrar" />
          </div>
				</form>
				<br>
      </div>
    </div>
  </div>
</div>
@endsection
