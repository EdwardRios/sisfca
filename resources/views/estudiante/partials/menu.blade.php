<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            {{--Menu Hamburguesa--}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Sistema Cs Agricolas</a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('docente.index') }}">Docente</a></li>
                <li><a href="{{ route('docente.create') }}">Nuevo Docente</a></li>
            </ul>
        </div>
    </div>

</nav>