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
