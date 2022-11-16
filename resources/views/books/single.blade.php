@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('books.partials.nav')
    {{-- {{dd($book)}} --}}
    <div class="container">
        <div class="row">

            <div class="col">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-6">

                            <h1 class="display-4">{{ $book->title}}</h1>
                            <p class="lead">By {{ $book->author}}</p>
                            <p class="lead">
                                <span class="badge badge-light">
                                    {{ $book->category}}
                                </span>
                            </p>
                        </div>
                        <div class="col-6">
                            <img src="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}" class="img-thumbnail rounded mx-auto d-block" alt="...">
                        </div>
                    </div>
                    <hr class="my-4">
                    <p>{{ $book->description}}</p>
                    <p class="lead">
                      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                  </div>
            </div>
        </div>
    </div>
    @endsection
