@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('books.partials.nav')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>
                    Edit: {{$book->title}}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('manage.books.update', $book->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Book Title" name="title"
                            value="{{ $book->title}}">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingTextarea2">Description</label>
                        <textarea name="description" class="form-control" placeholder="Book Description"
                            id="floatingTextarea2" style="height: 100px">{{$book->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ $book->image ? asset('storage/' . $book->image ) : asset('/images/no-image.png')}}" class="img-thumbnail rounded mx-auto d-block" alt="...">

                            </div>
                            <div class="col-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" placeholder="Add Image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn"
                                    value="{{ $book->isbn}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" placeholder="Category"
                                    name="category" value="{{ $book->category}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" placeholder="Author" name="author"
                                    value="{{ $book->author}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="total_books" class="form-label">Total Books</label>
                                <input type="text" class="form-control" id="total_books" placeholder="Total Books"
                                    name="total_books" value="{{ $book->total_books}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="book_source_id" class="form-label">Book Source</label>
                                <input type="text" class="form-control" id="book_source_id" placeholder="Book Source"
                                    name="book_source_id" value="{{ $book->book_source}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="rack" class="form-label">Rack Number</label>
                                <input type="text" class="form-control" id="rack" placeholder="Rack Number" name="rack"
                                    value="{{ $book->rack_no}}">
                            </div>
                        </div>
                        {{-- <div class="col-6 mb-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="available"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="available">Available</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="not_available"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="not_available">Not Available</label>
                            </div>
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
