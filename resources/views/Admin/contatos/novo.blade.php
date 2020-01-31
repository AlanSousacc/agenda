@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="panel-default">
        <form action="{{route('contato.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center">Cadastrar Contato</h1><br>
            @include('Admin.contatos.formContato')
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Cadastro</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $('.valorsessao').mask("#.##0,00", {reverse: true});
</script>
{{-- <script src='{{asset('admin/js/contato/contato.js')}}'></script> --}}
<script src='{{asset('admin/js/movimentacao/movimentacao.js')}}'></script>
@endpush
@endsection
