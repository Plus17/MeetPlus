<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
        @if (Auth::user()->role == 'admin')
            <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i>Profile</a>
        @else
            <a href="{{ route('profile.index') }}"><i class="fa fa-fw fa-bar-chart-o"></i>Profile</a>
        @endif
        </li>

        <li>
        @if (Auth::user()->role == 'admin')
            <a href="#"><i class="fa fa-fw fa-edit"></i> Events</a>
        @else
            <a href="{{ route('events.index') }}"><i class="fa fa-fw fa-edit"></i> Events</a>
        @endif
        </li>

        @if (Auth::check() && (Auth::user()->role == 'editor' or Auth::user()->role == 'admin'))
        <li>
            <a href="#"><i class="fa fa-fw fa-edit"></i> Posts</a>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->role == 'admin')
        <li>
            <a href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-edit"></i> Users</a>
        </li>
        @endif
    </ul>
</div>
