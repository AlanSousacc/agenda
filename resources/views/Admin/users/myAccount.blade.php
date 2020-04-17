@extends('layouts.master-admin')
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="container">
  <h3 class="text-center mb-5">Minha Conta</h3>
  <form method="post" action="{{route('routeUserUpdateMyAccount', $user)}}">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <div class="row">
      <div class="col-md-1 offset-md-2">
        <div class="form-group">
          <label for="nome">#ID</label>
          <div class="input-group">
            <input type="text" readonly class="form-control id text-center" name="id" value="{{$user->id}}">
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="nome">Perfil</label>
          <div class="input-group">
            <input type="text" readonly class="form-control perfil" value="{{$user->profile}}">
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="verified">Email verificado</label>
          <div class="input-group">
            <input type="text" readonly class="form-control verified" id="verified" value="{{Carbon\Carbon::parse($user->email_verified_at)->format('d/m/Y H:i:s')}}">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 offset-md-2">
        <div class="form-group">
          <label for="nome">Nome Completo</label>
          <div class="input-group">
            <input type="text" class="form-control nome" id="nome" placeholder="Digite o nome completo" value="{{$user->name}}" name="name"  autofocus minlength="5" maxlength="30">
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-group">
            <input type="email"  class="form-control email" id="email" placeholder="Digite o email" value="{{$user->email}}" name="email" required autofocus max="14">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 offset-md-2">
        <div class="form-group">
          <label for="nome">Senha</label>
          <div class="input-group">
            <input type="password" class="form-control password" id="password" placeholder="Senha" name="password">
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="email">Confirmação de Senha</label>
          <div class="input-group">
            <input type="password" class="form-control email" id="email" placeholder="Confirmação de senha" name="password_confirmation">
          </div>
        </div>
      </div>
    </div>
  <div class="col-md-4 offset-md-2 mb-4">
    <button type="submit" class="btn btn-secondary">Salvar</button>
  </div>
</form>
</div>

@endsection
