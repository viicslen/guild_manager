<li class="nav-item">
    <a class="nav-link dropdown-toggle d-flex align-items-center"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        <span class="d-lg-none">Account</span>
        <div style="background-image: url({{ Auth::user()->avatar }})" class="rounded-circle z-depth-0 user-avatar d-none d-lg-inline-block"></div>
    </a>

    <div class="dropdown-menu dropdown-menu-lg-right scrollbar-default p-2" aria-labelledby="navbarDropdown">
        <div class="row">
            <div class="col-auto text-center">
                <div class="">
                    <img src="{{ Auth::user()->avatar }}" class="rounded-circle z-depth-0" style="object-fit: cover; width: 6rem; height: 6rem"/>
                </div>
            </div>
            <div class="col text-right">
                <h5 class="font-weight-bold dark-grey-text">{{ Auth::user()->user }}</h5>
                <h6 class="grey-text"><strong>{{ Auth::user()->family }}</strong></h6>
                <a href="{{ url('account/profile') }}" class="btn btn-rounded btn-info btn-sm text-white px-2 py-1 mx-0">
                    <small>
                        <i class="far fa-user px-1" aria-hidden="true"></i>
                        Profile
                    </small>
                </a>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Account</h6>
        <a class="dropdown-item d-block" href="{{ url('account/characters') }}"><i class="far fa-users mr-1"></i>Characters</a>
        @if(isset(Auth::user()->guild))
            <a class="dropdown-item d-block" href="{{ url("guilds/" . Auth::user()->guild->uuid) }}"><i class="far fa-landmark mr-1"></i>Guild</a>
        @endif
        <div class="dropdown-divider"></div>
        @if ( Auth::user()->id = 1 )
            <h6 class="dropdown-header">Admin</h6>
            <a class="dropdown-item d-block" href="/chat"><i class="fas fa-comments mr-1"></i>Chat</a>
            <div class="dropdown-divider"></div>
        @endif
        <form method="post" action="{{url('logout')}}">
            @csrf
            <button class="dropdown-item px-2"><i class="fas fa-power-off mr-1"></i>Log Out</button>
        </form>
    </div>
</li>
