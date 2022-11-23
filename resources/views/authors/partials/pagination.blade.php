<nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
        @if ($authors->previousPageUrl())
            <li class="page-item"><a class="page-link" href="{{ $authors->previousPageUrl() }}">Previous</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        @endif

        @for ($page = 1; $page <= $authors->lastPage(); $page++)
            <li class="page-item">
                <a class="page-link"
                    href="{{ $authors->path() . '?' . $authors->getPageName() . '=' . $page }}">{{ $page }}</a>
            </li>
        @endfor

        @if ($authors->nextPageUrl())
            <li class="page-item"><a class="page-link" href="{{ $authors->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><a class="page-link">Next</a></li>
        @endif
    </ul>
</nav>
