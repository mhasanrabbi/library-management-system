<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (request()->is('user.register'))
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link">
                            <h4><b>এসো বই পড়ি</b></h4>
                        </a>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link">
                            <h4><b>এসো বই পড়ি</b></h4>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <form class="form-inline ml-5" action="#" method="GET">
                        {{-- @csrf --}}
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            name="search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
