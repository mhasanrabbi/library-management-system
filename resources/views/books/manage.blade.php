@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('books.partials.nav')

    <div class="container table-container mt-5">
        @if (session('message'))
        <div class="row">
            <div class="col">
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h2>Manage Books</h2>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead class="table bg-secondary text-white">
                        <tr>
                            <th scope="col">ISBN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Total Books</th>
                            <th scope="col">Book Source</th>
                            <th scope="col">Rack No.</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless(empty($books))
                        @foreach($books as $book)
                        <tr>
                            <th scope="row">{{ $book->isbn }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->total_books }}</td>
                            <td>{{ $book->book_source }}</td>
                            <td>{{ $book->rack_no }}</td>
                            <td>{{ $book->created_at }}</td>
                            <td class="text-center text-success">
                                <a href="{{ route('manage.books.edit', $book->id) }}" class="btn btn-success"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-center text-danger">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <form action="{{ route('manage.books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('delete')

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                            data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No data found</td>
                        </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
        @include('books.partials.pagination')
    </div>
    @endsection
