@extends('layouts.master-admin')
@section('master')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-1 mb-3">
      <div class="panel-default">
        <form autocomplete="off" action="{{route('gerarMov.store')}}" method="POST">
          {{csrf_field()}}
          <div class="panel-body">
            <h3 class="text-center">Gerar Fatura de Agendamento</h3><br>
            @include('Admin.fullcalendar.formGeraMov')
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
</script>
@endpush
@endsection

