{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('authors.index') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage.authors.index') }}">Manage Authors</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}



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
                {{-- <li class="nav-item {{ request()->routeIs('books.index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('books.index')}}">Books</a>
                </li> --}}
                {{-- <li class="nav-item {{ request()->routeIs('manage.books.create') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('manage.books.create')}}">Add Book</a>
                </li>
                <li class="nav-item {{ request()->routeIs('manage.books.index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('manage.books.index')}}">Manage Books</a>
                </li>
                <li class="nav-item {{ request()->routeIs('books.trashed') ? 'active' : ''}}">
                    <a class="nav-link btn btn-info text-white" href="{{route('books.trashed')}}">Trash <i
                            class="fas fa-trash"></i></a>
                </li> --}}

                {{-- new  --}}
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.authors.index') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('admin.manage.authors.index') }}"><i class="fas fa-cog"></i> Manage Authors</a>
                </li>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#authorModal">
                    <i class="fas fa-plus-square"></i> New Author
                </button>

            </ul>

            {{-- @if (request()->routeIs('books*'))
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
            @endif --}}

            <form class="form-inline ml-5" action="#" method="GET">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                    name="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>

                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-sm btn-outline-danger">Logout</button>
                </form>

            </div>
    </div>
</nav>



<!--Authors Modal -->
<div class="modal fade" id="authorModal" tabindex="-1" role="dialog" aria-labelledby="authorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authorModalLabel" style="color: #487eb0"><i class="fas fa-plus-square"></i>
                    New Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.authors.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Author Name</label>
                        <input type="text" name="author_name" class="form-control" id="name"
                            placeholder="Enter author name">
                        @error('author_name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
                        Author</button>
                </div>
            </form>
        </div>
    </div>
</div>
