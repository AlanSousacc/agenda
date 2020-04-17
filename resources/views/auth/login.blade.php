<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AgendaBETHA | Entrar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='{{asset('admin/css/app.css')}}' rel='stylesheet' />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="{{URL::asset('assets/master-admin/img/AgendaBETHA.png')}}" class="brand-image" style="max-width:170px; max-height:170px">
    </div>
    <!-- /.login-logo -->
    <div class="card" style="margin-bottom: 0;">
      <div class="card-body login-card-body">

        <form method="POST" autocomplete="off" action="{{ route('login') }}">
          @csrf

          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control" name="email" placeholder="EMAIL" value="{{ old('email') }}" required autocomplete="off" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text pt-3">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input id="password" type="password" placeholder="SENHA" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

            @error('password')
            {{ $message }}
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text pt-3">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-circle btn-primary btn-block">ACESSAR</button>
            </div>
            <div class="col-12 text-center pt-2">
              @if (Route::has('password.request'))
              <a class="btn btn-link pl-0" href="{{ route('password.request') }}">
                RECUPERAR SENHA
              </a>
              @endif
            </div>
            <!-- /.col -->
          </div>

        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    @if($errors->any())
      <div class="alert alert-danger" style="border-radius: 0; text-align: center; border-radius: 50px">
        <ul style="padding: 0; margin: 0 auto; list-style: none">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('admin/js/jquery.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/js/bootstrap.bundle.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/js/adminlte.js')}}"></script>

</body>
</html>
