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
                        <div class="card mb-3" style="width: 18rem; height: 25rem;">
                            <img class="card-img-top"
                                src="{{ $book->image ? asset('storage/' . $book->image) : asset('/images/no-image.png') }}"
                                alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                                <p class="card-text" style=" width: 16rem;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                -webkit-line-clamp: 3;
                                overflow: hidden;">{{ Str::words($book->description, 10) }}</p>
                                <span class="badge badge-light" style=" width: 2rem";>{{ $book->category }}</span>
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
                    </div>
                @endforeach
            </div>
            @include('books.partials.pagination')
        </div>
    </div>
@endsection
