<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistema Cs. Agricolas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  {{--<!--<script src="{{ asset('js/jquery.js') }}"></script>-->--}}

  <![endif]-->

    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    {{--DatePicker--}}
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('locales/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
    <link href="{{asset('dist/css/select2.css') }}" rel="stylesheet">
    <script src="{{asset('dist/js/select2.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/select2-bootstrap.css') }}">
  {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">--}}
    <link href="{{ asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <script src="{{asset('js/datatables.js')}}"></script>
    <link href="{{ asset("css/styles.css")}}" rel="stylesheet">
    <link href="{{ asset("css/pdfStyles.css")}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('img/smallLogoGota.png') }}}">
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset('img/smallLogoGota.png')}}" width="50%" height="50%" alt=""></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset('img/logofac02.png')}}" width="80%" height="80%" alt="logoGota"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown">
              <a href="#" class="">Hoy es {{ \Jenssegers\Date\Date::now()->format('l, d \d\e F \d\e Y') }}</a>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            @if (Auth::guest())
             <li><a href="{{ route('login') }}">Login</a></li>
             <li><a href="{{ route('register') }}">Register</a></li>
             @else
            <a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="dropdown"
              {{--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}

                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Cerrar sesion
              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                {{ csrf_field() }}
              </form>
              {{--<span class="hidden-xs">{{ Auth::user()->name }} <span class="caret"></span></span>--}}

            </a>
            {{--<ul class="dropdown-menu">--}}
              {{--<!-- User image -->--}}
              {{--<li class="user-header">--}}
                {{--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}

                {{--<p>--}}
                  {{--Alexander Pierce - Web Developer--}}
                  {{--<small>Member since Nov. 2012</small>--}}
                {{--</p>--}}
              {{--</li>--}}
              {{--<!-- Menu Body -->--}}
              {{--<li class="user-body">--}}
                {{--<div class="row">--}}
                  {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Followers</a>--}}
                  {{--</div>--}}
                  {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Sales</a>--}}
                  {{--</div>--}}
                  {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Friends</a>--}}
                  {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.row -->--}}
              {{--</li>--}}
              {{--<!-- Menu Footer-->--}}
              {{--<li class="user-footer">--}}
                {{--<div class="pull-left">--}}
                  {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                {{--</div>--}}
                {{--<div class="pull-right">--}}
                  {{--<ul>--}}
                  {{--<li>--}}
                    {{----}}
                  {{--</li></ul>--}}
                {{--</div>--}}
              {{--</li>--}}
            {{--</ul>--}}
            @endif
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  @if(Auth::check())
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel center-block" style="padding-bottom: 50px">
        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>
            @foreach ( Auth::user()->roles as $role)
              {{ $role->display_name }}
            @endforeach
            </a>
        </div>
      </div>
      <!-- search form -->
      {{--<form action="#" method="get" class="sidebar-form">--}}
        {{--<div class="input-group">--}}
          {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
        {{--</div>--}}
      {{--</form>--}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      {{--Menu principal --}}
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Registrar Datos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('docente.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar Docente</a></li>
              <li><a href="{{ route('estudiante.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar Estudiante</a></li>
              <li><a href="{{ route('programa.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar Programa</a></li>
              <li><a href="{{ route('materia.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar Modulo</a></li>
              <li><a href="{{ route('gestion.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar Gestion</a></li>
          </ul>

        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-child"></i> <span>Consultar Datos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('docente.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Lista datos Docente</a></li>
            <li><a href="{{ route('estudiante.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Lista datos Estudiante</a></li>
            <li><a href="{{ route('programa.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Lista datos programa</a></li>
            <li><a href="{{ route('gestion.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Lista Gestion</a></li>
          </ul>
        </li>
        {{--@role('academico')--}}
        <li class="treeview">
              <a href="#">
                  <i class="fa fa-list-alt"></i> <span>Programacion</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('oferta.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Ofertar Modulo</a></li>
                <li><a href="{{ route('inscripcion.create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Inscripcion Estudiante</a></li>
                <li><a href="{{ url('notas/create') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar Notas</a></li>
                <li><a href="{{ route('nota.lista') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Lista Notas</a></li>
              </ul>
        </li>
        {{--@endrole--}}
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-money"></i> <span>Contabilidad</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  {{--<li><a href="{{ route('cuenta.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Cuentas por cobrar</a></li>--}}
                  <li><a href="{{ route('estadoCuenta') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Ver estado de cuentas</a></li>
                  <li><a href="{{ route('pagos.crear') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Registrar pago</a></li>
                  <li><a href="{{ route('asignarDescuento') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Asignar Descuento</a></li>
              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-file-pdf-o"></i> <span>Reportes</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('reporte.certificado') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Certificado de Notas</a></li>
                  <li><a href="{{ route('reporte.noDeudor') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Certificado No Deudor</a></li>
                  <li><a href="{{ route('reporte.actaNotas') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Acta de notas</a></li>
                  {{--<li><a href="{{ route('pagosProgramas') }}"><i class="fa fa-circle-o" aria-hidden="true"></i>Pagos de programas</a></li>--}}
              </ul>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  @endif
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
      <section class="content">
          @yield('content')
      </section>

      {{--<h1>--}}
        {{--Blank page--}}
        {{--<small>it all starts here</small>--}}
      {{--</h1>--}}
      {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li><a href="#">Examples</a></li>--}}
        {{--<li class="active">Blank page</li>--}}
      {{--</ol>--}}
    {{--</section>--}}

    {{--<!-- Main content -->--}}
    {{--<section class="content">--}}

      {{--<!-- Default box -->--}}
      {{--<div class="box">--}}
        {{--<div class="box-header with-border">--}}
          {{--<h3 class="box-title">Title</h3>--}}

          {{--<div class="box-tools pull-right">--}}
            {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
              {{--<i class="fa fa-minus"></i></button>--}}
            {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
              {{--<i class="fa fa-times"></i></button>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<div class="box-body">--}}
          {{--Start creating your amazing application!--}}
        {{--</div>--}}
        {{--<!-- /.box-body -->--}}
        {{--<div class="box-footer">--}}
          {{--Footer--}}
        {{--</div>--}}
        {{--<!-- /.box-footer-->--}}
      {{--</div>--}}
      {{--<!-- /.box -->--}}

    {{--</section>--}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
      {{--<strong> <a href="http://almsaeedstudio.com">Almsaeed Studio V 2.3.11</a></strong>--}}
    {{--<div class="pull-right hidden-xs">--}}
      {{--<b><a href="http://www.fb.com/softsed">Edward Rios</a></b>--}}
    {{--</div>--}}
      <a href="https://www.linkedin.com/in/edwardrios/">Desarrollado por Edward Rios</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

@yield('scripts')
</body>
</html>
