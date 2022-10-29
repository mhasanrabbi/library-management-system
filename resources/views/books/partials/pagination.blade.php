<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if($books->previousPageUrl())
        <li class="page-item">
            <a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="page-link" href="{{ $books->previousPageUrl() }}" tabindex="-1">Previous</a>
        </li>
        @endif

        @for($page = 1; $page <= $books->lastPage(); $page++)
            <li class="page-item"><a class="page-link"
                    href="{{ $books->path() . '?' . $books->getPageName() . '=' . $page }}">{{$page}}</a></li>
            @endfor

            @if($books->nextPageUrl())
            <li class="page-item"><a class="page-link" href="{{ $books->nextPageUrl()}}">Next</a></li>
            @else
            <li class="page-item disabled">
                <a class="page-link" href="{{ $books->nextPageUrl() }}" tabindex="-1" aria-disabled="true">Next</a>
            </li>
            @endif
    </ul>
</nav>
