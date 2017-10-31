<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>Sistema Ciencias Agricolas</title>
    <!-- Styles -->
    <link rel="shortcut icon" href="{{{ asset('img/FClogo.png') }}}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('dist/css/select2.css') }}" rel="stylesheet">
    <script src="{{asset('dist/js/select2.js')}}"></script>
    <script src="{{asset('dist/js/i18n/es.js')}}"></script> <!--Select2 al idioma español-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet"> <!--Calendario-->
    <link href="{{ asset("css/styles.css") }}" rel="stylesheet">
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('locales/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}" charset="UTF-8"></script>
    <link href="{{ url('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/brand.png') }}" alt="Postgrado Cs. Agricolas">
                    {{--{{ config('app.name', 'Postgrado Cs. Agricolas') }}--}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Docente
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('docente.create') }}">Registrar Docente</a></li>
                                <li><a href="{{ route('docente.index') }}">Mostrar Docente</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estudiante
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('estudiante.create') }}">Registrar Estudiante</a></li>
                                <li><a href="{{ route('estudiante.index') }}">Mostrar Estudiante</a></li>
                                <li><a href="{{ route('inscripcion.create') }}">Inscripcion Estudiante</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Programacion
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('programa.create') }}">Registrar Programa</a></li>
                                <li><a href="{{ route('programa.index') }}">Mostrar programa</a></li>
                                {{--<li><a href="{{ route('programa.show') }}">Mostrar programa</a></li>--}}
                                <li><a href="{{ route('materia.create') }}">Registrar Materias</a></li>
                                <li><a href="{{ route('gestion.create') }}">Registrar Gestion</a></li>
                                <li><a href="{{ route('gestion.index') }}">Lista Gestion</a></li>
                                <li><a href="{{ route('oferta.create') }}">Oferta Materia</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contabilidad
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('cuenta.index') }}">Cuentas por cobrar</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notas
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('notas/create') }}">Registrar Notas</a></li>
                                <li><a href="{{ route('nota.lista') }}">Lista Notas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('reporte.certificado') }}">Certificado de Notas</a></li>
                                <li><a href="{{ route('reporte.noDeudor') }}">Certificado No Deudor</a></li>
                                <li><a href="{{ route('reporte.actaNotas') }}">Acta de notas</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->

@yield('scripts')
</body>
</html>
