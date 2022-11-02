<nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
        @if ($categories->previousPageUrl())
            <li class="page-item"><a class="page-link" href="{{ $categories->previousPageUrl() }}">Previous</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        @endif

        @for ($page = 1; $page <= $categories->lastPage(); $page++)
            <li class="page-item">
            <a class="page-link"
                    href="{{ $categories->path() . '?' . $categories->getPageName() . '=' . $page }}">{{ $page }}</a>
            </li>
        @endfor

        @if ($categories->nextPageUrl())
            <li class="page-item"><a class="page-link" href="{{ $categories->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><a class="page-link">Next</a></li>
        @endif
    </ul>
</nav>