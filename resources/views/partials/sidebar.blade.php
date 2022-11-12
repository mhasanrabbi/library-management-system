<nav id="sidebar">
    <div class="sidebar-header text-center">
        <a href="{{'/'}}"><img style="height: 50px; width: 180px;" src="{{asset('assets/img/lms.png')}}" alt=""></a>
    </div>

    <ul class="list-unstyled components">
        <p><a href="/">Dashboard</a></p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/books">Books</a>
                </li>
                <li>
                    <a href="{{ route('authors.index') }}">Authors</a>
                </li>
                <li>
                    <a href="#">Categories</a>
                </li>
                <li>
                    <a href="#">Publications</a>
                </li>
                <li>
                    <a href="#">Publishers</a>
                </li>
                <li>
                    <a href="#">Book Source</a>
                </li>
                <li>
                    <a href="{{ route('rack') }}">Rack</a>
                </li>
                <li>
                    <a href="#">Assets</a>
                </li>
                <li>
                    <a href="{{route('vendors.index')}}">Vendor</a>
                </li>
                <li>
                    <a href="#">Staff Members</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User Management</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{url('admin/users')}}">Users</a>
                </li>
                <li>
                    <a href="{{url('admin/roles')}}">Roles</a>
                    <a href="{{url('admin/roles')}}">Roles</a>
                </li>
                <li>
                    <a href="{{url('admin/permissions')}}">Permissions</a>
                </li>
                <li>
                    <a href="{{url('admin/permissions')}}">Permissions</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://github.com/mhasanrabbi/library-management-system" class="article">Github Repo</a>
        </li>
    </ul>
</nav>
