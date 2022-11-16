@extends('layouts.layout')
@section('content')
    <div id="content">
        @include('authors.partials.message')
        @include('authors.partials.nav')

        <div class="container">
            <div class="row mb-1">
                <div class="col">
                    <h4 class="d-inline" style="color: #34495e">Authors List For Manage</h4>
                    <a href="{{ route('admin.authors.index') }}" type="button" class="btn btn-outline-primary text-right"><i
                            class="fas fa-clipboard-list"></i> Authors List</a>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color: #ff6b6b">
                                <th style="color: #34495e">Id</th>
                                <th style="color: #34495e">Name</th>
                                <th style="color: #34495e">Created</th>
                                <th style="color: #34495e">Updated</th>
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
                                        <td>{{ $author->created_at }}</td>
                                        <td>{{ $author->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary editbtn" data-toggle="modal"
                                                data-target="#authorEditModal{{ $author->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#authorDeleteModal{{ $author->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!--Author edit Modal -->
                                    <div class="modal fade" id="authorEditModal{{ $author->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="authorModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="authorModalLabel" style="color: #487eb0"><i
                                                            class="fas fa-edit"></i>
                                                        {{ $author->author_name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.manage.authors.update', $author->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Author Name</label>
                                                            <input type="text" name="author_name" class="form-control"
                                                                id="author_name" value="{{ $author->author_name }}">
                                                            @error('author_name')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-success"><i
                                                                class="fas fa-edit"></i>
                                                            Author</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Authors delete Modal -->
                                    <div class="modal fade" id="authorDeleteModal{{ $author->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="authorModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="authorModalLabel" style="color: #ee5253"><i
                                                            class="fas fa-trash-alt"></i>
                                                        Do you want to Delete {{ $author->author_name }} ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.manage.authors.destroy', $author->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Author Name</label>
                                                            <input type="text" name="author_name" class="form-control"
                                                                id="author_name" value="{{ $author->author_name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-danger"><i
                                                                class="fas fa-trash-alt"></i>
                                                            Author</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No Record Found</td>
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
