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
                <form action="{{ route('manage.books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"
                            value="{{ $book->title }}">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingTextarea2">Description</label>
                        <textarea name="description" class="form-control" placeholder="Write Here"
                            id="floatingTextarea2" style="height: 100px">{{$book->description}}</textarea>
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
