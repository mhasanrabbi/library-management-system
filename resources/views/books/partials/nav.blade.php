<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                   {{-- {{ Cart::getTotalQuantity()}} --}}
                </li>
                <li class="nav-item {{ request()->routeIs('cart') ? 'active' : ''}}">
                
                    <a class="btn btn-success" href="{{route('cart')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <span id="items-in-cart">0</span> items in cart
                    </a>
                    {{-- <a class="nav-link" href="{{route('cart.list')}}">Cart</a> --}}
                </li>
                
                <li class="nav-item {{ request()->routeIs('books.index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('books.index')}}">Books</a>
                </li>
                <li class="nav-item {{ request()->routeIs('manage.books.create') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('manage.books.create')}}">Add Book</a>
                </li>
                <li class="nav-item {{ request()->routeIs('manage.books.index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('manage.books.index')}}">Manage Books</a>
                </li>
                <li class="nav-item {{ request()->routeIs('books.trashed') ? 'active' : ''}}">
                    <a class="nav-link btn btn-info text-white" href="{{route('books.trashed')}}">Trash <i
                            class="fas fa-trash"></i></a>
                </li>
            </ul>
            @if(request()->routeIs('books*'))
            <form class="form-inline ml-5" action="{{ route('books.index') }}" method="GET">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            @else
            <form class="form-inline ml-5" action="{{ route('manage.books.index') }}" method="GET">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            @endif
        </div>
    </div>
</nav>
