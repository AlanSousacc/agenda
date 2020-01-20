@extends('layouts.master-admin')
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <img src="{{URL::asset('assets/master-admin/img/unauthorized-access.png')}}" style="width: 100%; max-width:900px; margin:0 auto" alt="Acesso não permitido" alt="Acesso não permitido">
    </div>
  </div>
</div>
@endsection
