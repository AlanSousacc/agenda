@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-1 mb-3">
      <div class="panel-default">
        <form action="{{route('movimentacao.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h1 class="text-center">Registrar Movimentação</h1><br>
            @include('Admin.movimentacao.formMovimentacao')
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 7px;">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  $('.valortotal').mask("#.##0,00", {reverse: true});
  $('.valorrecebido').mask("#.##0,00", {reverse: true});
  $('.valorpendente').mask("#.##0,00", {reverse: true});
</script>
{{-- <script src='{{asset('admin/js/contato/contato.js')}}'></script> --}}
@endpush
@endsection
