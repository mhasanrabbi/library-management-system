<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @if (request()->routeIs('user.register') ||
                request()->routeIs('user.login') ||
                request()->routeIs('user.forget.password'))
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home') }}">
                            <h4><b>এসো বই পড়ি</b></h4>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('user.login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.login') }}">Log In</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('user.register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{'/'}}">
                            <h5><b>এসো বই পড়ি</b></h5>
                        </a>
                    </li>
                    @if (!empty(auth()->user()->id))
                    {{-- {{dd(auth()->user())}} --}}
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('show.carts') }}">
                                <p>Cart <span class="badge badge-primary">({{ cart_count() }})</span> </p>
                            </a>
                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <form class="form-inline ml-5" action="#" method="GET">
                        {{-- @csrf --}}
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            name="search">
                        <button class="btn-sm btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    @if (auth()->user())
                        <li class="nav-item">
                            <a class="nav-link"><b>{{ auth()->user()->name }}</b></a>
                        </li>
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-sm btn-outline-danger">Logout</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</nav>
