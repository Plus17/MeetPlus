<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="{{ route('profile.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i>Mi Perfil</a>
        </li>
        @if (Auth::check() && (Auth::user()->role == 'editor' or Auth::user()->role == 'admin'))
        <li>
            <a href="{{ route('admin.events.index') }}"><i class="fa fa-fw fa-edit"></i> Todos los eventos</a>
        </li>
        @endif
        <li>
            <a href="{{ route('events.index') }}"><i class="fa fa-fw fa-edit"></i> Mis Eventos</a>
        </li>

        @if (Auth::check() && (Auth::user()->role == 'editor' or Auth::user()->role == 'admin'))
        <li>
            <a href="#"><i class="fa fa-fw fa-edit"></i> Posts</a>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->role == 'admin')
        <li>
            <a href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-edit"></i> Usuarios</a>
        </li>
        @endif
    </ul>
</div>
