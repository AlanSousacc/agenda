@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('cc.store')}}" method="POST">
						@csrf
          <div class="panel-body">
            <h1 class="text-center my-3">Novo Centro de Custo</h1>
						@include('Admin.centrocusto.formCentroCusto')            
					</div>
						<button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Cadastro</button>
				</form>
      </div>
    </div>
  </div>
</div>
@endsection