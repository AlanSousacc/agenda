<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  {{-- star fullcalendar --}}
  <meta charset='utf-8' />
  <link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
	<link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />

  <link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />
  <link href='{{asset('admin/css/app.css')}}' rel='stylesheet' />

  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- end fullcalendar--}}

  <title>AgendaBETHA</title>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('contato.index')}}" class="nav-link">Contatos</a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <img src="{{URL::asset('assets/master-admin/img/agenda.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">AgendaBETHA</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{URL::asset('assets/master-admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="http://#">{{ Auth::user()->name }} <span class="caret d-block"></span></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
							</li>

							{{--  Sidebar cadastros  --}}
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-list"></i>
                  <p>Cadastro<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-address-card nav-icon"></i>
                      <p>
                        Contatos
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('contato.create')}}" class="nav-link">
                          <i class="fa fa-plus-circle nav-icon"></i>
                          <p>Novo Contato</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a  href="{{route('contato.index')}}" class="nav-link">
                          <i class="fa fa-list-ul nav-icon"></i>
                          <p>Listar Contatos</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fa fa-user-circle nav-icon"></i>
                      <p>
                        Usuários
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      @if (Auth::user()->profile == 'Administrador')
                      <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                          <i class="fa fa-plus-circle nav-icon"></i>
                          <p>Novo Usuário</p>
                        </a>
                      </li>
                      @endif
                      <li class="nav-item">
                        <a href="{{ route('routeUserList') }}" class="nav-link">
                          <i class="fa fa-list-ul nav-icon"></i>
                          <p>Listagem de Usuarios</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-address-book nav-icon"></i>
                  <p>
                    Minha Conta
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('routeUserAccount') }}" class="nav-link">
                      <i class="fa fa-edit nav-icon"></i>
                      <p>Alterar Meus Dados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-power-off nav-icon"></i>
                      <p>Sair</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                @yield('master')
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
          <!-- To the right -->
          <!-- Default to the left -->
          <strong>Copyright &copy; 2019 AgendaBETHA</strong> Todos os direitos reservados.
        </footer>
      </div>
			<!-- ./wrapper -->

			<script src="{{ asset('admin/js/jquery.js')}}"></script>

      <!-- REQUIRED SCRIPTS -->
      <script src="{{ asset('admin/js/app.js')}}"></script>
      {{-- start full calendar --}}
      <script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>

      <script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
      <script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
      <script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
      <script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>



      <script src='{{asset('assets/fullcalendar/packages/core/locales-all.js')}}'></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

      <script src='{{asset('assets/fullcalendar/js/script.js')}}'></script>

			<script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>

      {{-- end fullcalendar --}}
      <script>
      $(document).ready(function(){
        $('.pagination').addClass('float-lg-right');
        $('.telefone').mask('(00) 00000-0000');
        $('.documento').mask('000.000.000-00', {reverse: true});
      });
      </script>

      @stack('scripts')
    </div>

    </body>
    </html>
