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

        <div class="float-right">
            @if (request()->routeIs('rack'))
                <a href="{{ route('add.rack') }}" class="btn btn-primary text-white"><i class="fa fa-plus"
                        aria-hidden="true"></i> Add</a>
            @elseif(request()->routeIs('add.rack') || request()->routeIs('edit.rack'))
                <a href="{{ route('rack') }}" class="btn btn-secondary text-white"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i> Back</a>
            @else
                <a href="{{ route('rack') }}" class="btn btn-primary text-white"><i class="fa fa-table"
                        aria-hidden="true"></i> Rack</a>
            @endif
        </div>


    </div>
</nav>
