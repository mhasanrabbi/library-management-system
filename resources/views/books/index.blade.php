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
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{Str::words($book->description, 10)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
