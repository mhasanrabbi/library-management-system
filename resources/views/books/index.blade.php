@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('books.partials.nav')
    <div class="container">
        <div class="row">
            @foreach($books as $book)
            <div class="col-sm-4">
                <div class="card mb-3" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}" alt="Book Image">
                    <div class="card-body">
                        <a href="{{route('books.show', $book->id)}}">
                            <h5 class="card-title">{{ $book->title }}</h5>
                        </a>
                        <a href="">
                            <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                        </a>
                        <p class="card-text">{{Str::words($book->description, 10)}}</p>
                        <span class="badge badge-light">{{ $book->category }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @include('books.partials.pagination')
    </div>
    @endsection
