<li class="nav-item {{ (request()->segment(1) === 'home' || request()->is('/') ? 'active' : '') }}">
    <a class="nav-link" href="{{ url('/') }}">Home</a>
</li>
@auth
    @if(isset(Auth::user()->guild))
        <li class="nav-item {{ (request()->segment(1) === 'news' ? 'active' : '') }}">
            <a class="nav-link" href="{{ url('news') }}">News</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) === 'events' ? 'active' : '') }}">
            <a class="nav-link" href="{{ url('events') }}">Events</a>
        </li>
    @else
        <li class="nav-item {{ (request()->segment(1) === 'guilds' ? 'active' : '') }}">
            <a class="nav-link" href="{{ url("guilds") }}">Guilds</a>
        </li>
    @endif
@endauth
{{--<li class="nav-item dropdown">--}}
{{--    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"--}}
{{--       aria-expanded="false">Dropdown--}}
{{--    </a>--}}
{{--    <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink">--}}
{{--        <a class="dropdown-item" href="#">Action</a>--}}
{{--        <a class="dropdown-item" href="#">Another action</a>--}}
{{--        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--    </div>--}}
{{--</li>--}}
