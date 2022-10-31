@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('books.partials.nav')


    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Successful:</strong>
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <strong>Successful:</strong>
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="row">
            @foreach($books as $book)
            <div class="col-sm-4">
                <div class="card mb-3" style="width: 18rem;">
                 <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img class="card-img-top" src="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}" alt="Book Image">
                     <div class="card-body">
                        <a href="{{route('books.show', $book->id)}}">
                            <h5 class="card-title">{{ $book->title }}</h5>
                        </a>
                        <a href="">
                            <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author->author_name ?? 'N/A' }}</h6>
                        </a>
                        <p class="card-text">{{Str::words($book->description, 10)}}</p>
                        <span class="badge badge-light">{{ $book->category }}</span>
                      </div>
                       <div class="card-footer">

                        <input type="hidden" value="{{ $book->id }}" name="id">
                        <input type="hidden" value="{{ $book->title }}" name="title">
                        <input type="hidden" value="{{ ($book->price) ?? 10  }}" name="price">
                        <input type="hidden" value="{{ $book->category }}" name="category">
                        <input type="hidden" value="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}" name="image">
                        <input type="hidden" value="1" name="quantity">


                            {{-- @php
                            
                            $status = "active";
                            $items = Cart::getContent();   
                                foreach ($items as $item) {
                                    if ($book->id == $item->id){

                                        $status = "disabled";
                                    }else
                                    $status = "";
                                    
                                }
                            @endphp
                       
                       {{ dump($item) }} --}}

                      

                        <button type="submit" class="btn btn-success {{ ($status)??"" }}">
                            <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> add to Cart
                        </button>

                     </div>
                  </form>
                </div>
            </div>
            @endforeach
        </div>
        @include('books.partials.pagination')
    </div>


    @endsection
