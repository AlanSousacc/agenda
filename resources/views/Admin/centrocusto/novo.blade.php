@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('cc.store')}}" method="POST">
						@csrf
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Centro de Custo</h1><br>
						@include('Admin.centrocusto.formModulo')            
					</div>
						<button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Cadastro</button>
				</form>
      </div>
    </div>
  </div>
</div>
@endsection