@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('books.partials.nav')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>
                    Add Book
                </h3>
            </div>
        </div>

        @if($errors->any())
        <div class="row">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                    <ul>
                        <li>
                            {{$error}}
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.manage.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Book Title" name="title">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingTextarea2">Description</label>
                        <textarea name="description" class="form-control" placeholder="Book Description"
                            id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" placeholder="Add Image" name="image">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="number" class="form-control" id="isbn" placeholder="ISBN" name="isbn">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" placeholder="Category" name="category">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <select name="author" class="form-select" aria-label="Default select example">
                                <option selected>--- Select author ---</option>
                                @foreach($authors as $key => $author)
                                <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3"><select name="vendor" class="form-select" aria-label="Default select example">
                                <option selected>--- Select vendor ---</option>
                                @foreach($vendors as $key => $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="book_source_id" class="form-label">Book Source</label>
                                <input type="text" class="form-control" id="book_source_id" placeholder="Book Source" name="book_source">
                            </div>
                        </div>
                        <div class="col-6">
                            <select name="racks" class="form-select" aria-label="Default select example">
                                <option selected>--- Select Rack ---</option>
                                @foreach($racks as $key => $rack)
                                <option value="{{ $rack->id }}">{{ $rack->rack_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-6">
                            <div class="mb-3">
                                <label for="available" class="form-label">Available</label>
                                <input type="text" class="form-control" id="rack" placeholder="Available" name="available">
                            </div>
                        </div> --}}
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">
                            Add Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
