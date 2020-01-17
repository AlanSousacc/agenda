@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="panel-default">
        <form action="{{route('contato.update', $contato->id)}}" method="post">
          {{method_field('patch')}}
          {{csrf_field()}}
          <div class="panel-body">
            <input type="hidden" name="contato_id" id="contid" value="{{$contato->id}}">
            <h1 class="text-center">Detalhes do Contato</h1><br>
            @include('Admin.contatos.formContato')
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Alterações</button>
        </form>
      </div>
    </div>
	</div>
	{{-- Detalhar --}}
	@include('Admin.movimentacao.modalVisualizar')
</div>

@push('scripts')
<script src='{{asset('admin/js/contato/contato.js')}}'></script>
<script src='{{asset('admin/js/movimentacao/movimentacao.js')}}'></script>
@endpush
@endsection
