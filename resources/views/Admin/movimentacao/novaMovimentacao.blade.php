@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
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

{{-- @push('scripts')
<script src='{{asset('admin/js/contato/contato.js')}}'></script>
@endpush --}}
@endsection
