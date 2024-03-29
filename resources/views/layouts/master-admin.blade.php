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

	{{-- DATATABLES --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
	

	{{-- PARA FUNCIONAR BOOTSTRAP MODAL --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <div class="col-md-6 float-left">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
					</li>
					{{-- <x-relatorios-layout> 
					</x-relatorios-layout> --}}
          {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard" class="nav-link">Dashboard</a>
          </li> --}}
        </ul>
      </div>
      <div class="col-md-6 float-right">
        <div class="btn-group dropleft show float-right mr-3">
          <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="color: #7f7f7f;">
            <a class="dropdown-item" href="{{route('routeUserAccount')}}">Minha Conta</a>
            @if (Auth::user()->profile == 'Administrador')
            <a href="{{route('empresa.show', Auth::user()->empresa_id)}}" class="dropdown-item">Minha Empresa</a>
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">Sair</a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link" style="color: #fff">
        @if ($empresa->logo)
        <img src="/uploads/logos/{{$empresa->logo}}" alt="{{$empresa->apelido}}" class="brand-image img-circle elevation-3" style="max-width:35px; max-height:35px">
        <span class="brand-text font-weight-light">{{$empresa->apelido}}</span>
        @else
        <img src="{{URL::asset('assets/master-admin/img/schedule.png')}}" alt="{{$empresa->apelido}}" class="brand-image img-circle elevation-3" style="max-width:35px; max-height:35px">
        @endif
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{--  Sidebar agendamento  --}}
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-calendar-alt"></i>
                <p>
                  Agendamentos
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/" class="nav-link">
                    <i class="fa fa-calendar-check nav-icon"></i>
                    <p>Agenda</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('routeEventList')}}" class="nav-link">
                    <i class="fa fa-calendar-week nav-icon"></i>
                    <p>Agendamentos</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('saladeespera')}}" class="nav-link">
                    &nbsp;<img src="{{URL::asset('assets/master-admin/img/waiting_room.png')}}" alt="icon room" style="max-width:20px">
                    <p>&nbsp;Sala de Espera</p>
                  </a>
                </li>
							</ul>
            </li>
            {{-- end agendamentos --}}

            {{-- Sidebar movimentação --}}
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-dollar-sign"></i>
                <p>
                  Financeiro
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('movimentação.index')}}" class="nav-link">
                    <i class="fa fa-money-bill-alt nav-icon"></i>
                    <p>Movimentações</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- end movimentação --}}

            {{-- Sidebar cadastros --}}
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-address-book"></i>
                <p>Cadastros</p>
              </a>
              @if (Auth::user()->isAdmin == 1)
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('empresa.index')}}" class="nav-link">
                    <i class="fa fa-landmark nav-icon"></i>
                    <p>Empresas</p>
                  </a>
                </li>
              </ul>
              @endif
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('contato.index')}}" class="nav-link">
                    <i class="fa fa-address-card nav-icon"></i>
                    <p>Contatos</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('routeUserList') }}" class="nav-link">
                    <i class="fa fa-user-circle nav-icon"></i>
                    <p>Usuários</p>
                  </a>
                </li>
              </ul>
              @if (Auth::user()->profile == 'Administrador')
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('cc.list') }}" class="nav-link">
                    <i class="fa fa-money-check-alt nav-icon"></i>
                    <p>Centro de Custo</p>
                  </a>
                </li>
              </ul>
              @endif

              @if (Auth::user()->profile == 'Administrador')
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('tipoevento.list') }}" class="nav-link">
                    <i class="fa fa-calendar-alt  nav-icon"></i>
                    <p>Tipo de Agendamento</p>
                  </a>
                </li>
              </ul>
              @endif
						</li>
						<li class="nav-item has-treeview menu-open">
							<a href="#" class="nav-link">
								<i class="fa fa fa-chart-bar nav-icon"></i>
								<p>
									Relatórios
								</p>
							</a>
							<x-relatorios-layout> 
							</x-relatorios-layout>
						</li>
						
						{{-- Sidebar Medidas --}}
						{{-- <li class="nav-item has-treeview menu-open">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-dumbbell"></i>
								<p>Academia</p>
							</a>
							@if (Auth::user()->profile == 'Administrador')
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{route('medidas.list')}}" class="nav-link">
										<i class="fa fa-balance-scale-right nav-icon"></i>
										<p>Medidas</p>
									</a>
								</li>
							</ul>
						</li>
							@endif --}}
							{{-- Fim Sidebar Medidas --}}

						@if (Auth::user()->profile == 'Administrador')
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="fa fa-cog nav-icon"></i>
                <p>
                  Configurações
                </p>
              </a>

							@if (Auth::user()->isAdmin == 1)
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('modulos.list') }}" class="nav-link">
                    <i class="fa fa-folder-minus nav-icon"></i>
                    {{-- <p>Módulos    <span class="badge badge-pill badge-success">{{$zmodulos->count()}}</span></p> --}}
                    <p>Módulos</p>
                  </a>
                </li>
              </ul>
							@endif
							<ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('configuracao')}}" class="nav-link">
                    <i class="fa fa-folder-minusfa fa-sliders-h nav-icon"></i>
                    <p>Geral</p>
                  </a>
                </li>
              </ul>
						</li>
						@endif
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <div class="content-header">
        </div> --}}
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
      <footer class="main-footer text-center">
        <!-- To the right -->
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 AgendaBETHA</strong> Todos os direitos reservados.
      </footer>
    </div>

    @include('Admin.movimentacao.relatorios.consulta-periodo')
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

    {{-- DATE PICKER --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src='{{asset('assets/fullcalendar/js/script.js')}}'></script>

    <script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>

    <script src='{{asset('admin/js/movimentacao/consultapersonalizada.js')}}'></script>

    <script src='https://cdnjs.com/libraries/jquery.mask'></script>

    {{-- set active page --}}
    <script>
      $(function () {
        setNavigation();
        setNavigationOpenMenu();
      });

      function setNavigation() {
        var path = window.location.pathname;
        path = path.replace(/\/$/, "");
        path = decodeURIComponent(path);
        path = 'http://agendabetha' + path

        $('.nav a').each(function () {
          var href = $(this).attr('href');
          if (path == href) {
            $(this).closest('li').addClass('active');
          }
        });
      }

      function setNavigationOpenMenu() {
        var path = window.location.pathname;
        path = path.replace(/\/$/, "");
        path = decodeURIComponent(path);
        path = 'http://agendabetha' + path

        $('.sidebar a').each(function () {
          if (path == (this.href)) {
            $(this).closest('li').addClass('menu-open');
            $(this).closest('li').parent().parent().addClass('menu-open');
          }
        });
      }
    </script>
    {{-- end set active page --}}

    {{-- end fullcalendar --}}
    <script>
      $(document).ready(function(){
        $('.pagination').addClass('float-lg-right');
        $('.telefone').mask('(00) 00000-0000');
        $('.documento').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.cep').mask('00000-000', {reverse: true});
      });
    </script>
    @stack('scripts')
  </div>
</body>
</html>
