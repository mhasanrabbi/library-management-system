@extends('users.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content">

        @include('users.partials.nav')
        <div class="container">
            @if (session('message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning">
                            {!! session('message') !!}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-sm-4">
                        <a href="{{ route('book.details', $book->id) }}">
                        <div class="card mb-3" style="width: 18rem; height: 19rem;">
                            <img class="card-img-top"
                                src="{{ $book->image ? asset('storage/' . $book->image) : asset('/images/no-image.png') }}"
                                alt="Book Image" style="height: 100px; width: 286px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                                <p class="card-text" style=" width: 16rem;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                -webkit-line-clamp: 2;
                                white-space: pre-line;
                                overflow: hidden;">{{ Str::words($book->description, 10) }}</p>
                                <span class="badge badge-light text-truncate" style=" width: 6rem";>{{ $book->category }}</span>
                                @auth
                                    @if ($book->total_books == $book->borrows->count())
                                        <button class="btn btn-secondary btn-sm float-right disabled">Stock Out</button>
                                    @else
                                        <a href="{{ route('add.cart', [$book->id]) }}" type="button"
                                            class="btn btn-success btn-sm float-right">Add To
                                            Cart</a>
                                    @endif
                                @else
                                    <a href="{{ route('user.login') }}" type="button" class="btn btn-success btn-sm float-right">Add To
                                        Cart</a>
                                @endauth
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
            @include('books.partials.pagination')
        </div>
    </div>
@endsection
