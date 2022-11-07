@extends('layouts.layout')

@section('content')

<div id="content">
    @include('partials.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Dashboard</h2>
            </div>
        </div>



        <div class="row">
            @php
            // dd($data)
            @endphp
            @foreach($books as $book)
            <div class="col-sm-4">
                <div class="card mb-3" style="width: 18rem;">
                    {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data"> --}}
                        {{-- @csrf --}}
                        <img class="card-img-top"
                            src="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}"
                            alt="Book Image">
                        <div class="card-body">
                            <a href="{{route('books.show', $book->id)}}">
                                <h5 class="card-title">{{ $book->title }}</h5>
                            </a>
                            <a href="">
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author->author_name ?? 'N/A' }}
                                </h6>
                            </a>
                            <p class="card-text">{{Str::words($book->description, 10)}}</p>
                            <span class="badge badge-light">{{ $book->category }}</span>
                        </div>
                        <div class="card-footer">

                            <input type="hidden" value="{{ $book->id }}" name="id">
                            <input type="hidden" value="{{ $book->title }}" name="title">
                            <input type="hidden" value="{{ ($book->price) ?? 10  }}" name="price">
                            <input type="hidden" value="{{ $book->category }}" name="category">
                            <input type="hidden"
                                value="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}"
                                name="image">
                            <input type="hidden" value="1" name="quantity">





                            <div class="btn-group">
                                <input type="number" value="1" min="1" max="100">
                                <button class="add-to-cart" type="button" class="btn btn-sm btn-outline-secondary"
                                    data-id="{{ $book->id }}" data-title="{{ $book->title }}"
                                    data-price="{{ ($book->price) ?? 12 }}">Add to Cart</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        @include('books.partials.pagination')
    </div>
</div>
@endsection