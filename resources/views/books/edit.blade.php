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
                                <select name="author_id" class="form-select" aria-label="Default select example">
                                    {{-- <option  @if(!empty(old('author_id'))) selected @endif>--- Select author ---</option> --}}
                                    <option  class="bg-info text-white" value="{{ old('author_id')}}" selected>
                                     {{ (($book->author->author_name) ?? "---Select Author----") }}
                                    </option>
                                    @foreach($authors as $key => $author)
                                    <option 
                                    @if(old('author_id')) selected @endif
                                     value="{{ $author->id }}">
                                     {{ $author->author_name }}
                                    </option>
                                    @endforeach
                                </select>
                               
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">

                        <select name="vendor" class="form-select" aria-label="Default select example">
                            <option selected>--- Select vendor ---</option>
                            @foreach($vendors as $key => $vendor)
                            <option value="{{ $vendor->name }}">{{ $vendor->name }}</option>
                            @endforeach
                        </select>
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
                            <div class="mb-3"><select name="racks" class="form-select" aria-label="Default select example">
                                <option selected>--- Select Rack ---</option>
                                @foreach($racks as $key => $rack)
                                <option value="{{ $rack->rack_name }}">{{ $rack->rack_name }}</option>
                                @endforeach
                            </select>
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
