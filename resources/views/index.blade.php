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
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
                @endif
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-sm-4">
                        <div class="card mb-3" style="width: 18rem;">
                            <img class="card-img-top"
                                src="{{ $book->image ? asset('storage/' . $book->image) : asset('/images/no-image.png') }}"
                                alt="Book Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                                <p class="card-text">{{ Str::words($book->description, 10) }}</p>
                                <span class="badge badge-light">{{ $book->category }}</span>
                                <a href="{{ route('add.cart', [$book->id]) }}" type="button" class="btn btn-success btn-sm">Add To
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('books.partials.pagination')
        </div>
    </div>
@endsection
