@extends('users.layout')
@section('content')
    <div id="content">
        @include('users.partials.nav')
        <div class="container">
            <div class="row">
                <div class="card mb-3">
                    <div class="row g">
                        <div class="col-md-4">
                            <img src="{{ $bookDetails->image ? asset('storage/' . $bookDetails->image) : asset('/images/no-image.png') }}"
                            alt="Book Image" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Title: {{ $bookDetails->title }}</h5>
                                <p class="card-text"> <b>Description:</b> {{ $bookDetails->description }}</p>
                                <p class="card-text">ISBN: {{ $bookDetails->isbn }}</p>
                                <p class="card-text">Category: {{ $bookDetails->category }}</p>
                                <p class="card-text">Book Source: {{ $bookDetails->book_source }}</p>
                                <p class="card-text">Rack Name: {{ @$bookDetails->rack->rack_name }}</p>
                                @auth
                                    @if ($bookDetails->total_books == $bookDetails->borrows->count())
                                        <button class="btn btn-secondary btn-sm float-right disabled">Stock Out</button>
                                    @else
                                        <a href="{{ route('add.cart', [$bookDetails->id]) }}" type="button"
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
                </div>
            </div>
        </div>
    </div>
@endsection
