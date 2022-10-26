@extends('layouts.layout')
@section('content')
    <div id="content">
        @include('authors.partials.message')
        @include('authors.partials.nav')

        <div class="container">
            <div class="row mb-1">
                <div class="col">
                    <h4 style="color: #34495e">Authors List For Manage</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color: #ff6b6b">
                                <th style="color: #34495e">Id</th>
                                <th style="color: #34495e">Name</th>
                                <th style="color: #34495e">Edit</th>
                                <th style="color: #34495e">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @unless(count($authors) == 0)
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->author_name }}</td>
                                        <td>
                                            <button value="{{ $author->id }}" type="button"
                                                class="btn btn-outline-primary editbtn" data-toggle="modal"
                                                data-target="#authorModal{{ $author->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="#" method="POST">
                                                <input type="hidden" name="id" value="#">
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>
            @include('authors.partials.pagination')
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.editbtn', function(){
                $('#authorModal').modal('show');
            });
        });
    </script>
@endsection --}}

<!--Authors edit Modal -->
<div class="modal fade" id="authorModal{{ $author->id }}" tabindex="-1" role="dialog" aria-labelledby="authorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authorModalLabel" style="color: #487eb0"><i class="fas fa-edit"></i>
                    {{ $author->author_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('authors.store') }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Author Name</label>
                        <input type="text" name="author_name" class="form-control" id="author_name"
                            value="{{ $author->author_name }}">
                        @error('author_name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-edit"></i>
                        Author</button>
                </div>
            </form>
        </div>
    </div>
</div>
