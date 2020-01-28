@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('tipoevento.store')}}" autocomplete="off" method="POST">
						@csrf
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Tipo de Evento</h1><br>
						@include('Admin.tipoevento.formTipoEvento')
					</div>
						<button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Cadastro</button>
				</form>
      </div>
    </div>
  </div>
</div>
@endsection
