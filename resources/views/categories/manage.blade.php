@extends('layouts.layout')
@section('content')
    <div id="content">
        @include('categories.partials.message')
        @include('categories.partials.nav')

        <div class="container">
            <div class="row mb-1">
                <div class="col">
                    <h4 class="d-inline" style="color: #34495e"> Categories List For Manage</h4>
                    <a href="{{ route('manage.categories.index') }}" type="button" class="btn btn-outline-primary text-right"><i
                            class="fas fa-clipboard-list"></i> Categories List</a>
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
                            @unless(count($categories) == 0)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->Category_name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary editbtn" data-toggle="modal"
                                                data-target="#categoryEditModal">
                                                <i class="fas fa-edit">{{ $category->id }}</i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#categoryDeleteModal{{ $category->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!--Category edit Modal -->
                                    <div class="modal fade" id="categoryEditModal{{ $category->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="categoryModalLabel" style="color: #487eb0"><i
                                                            class="fas fa-edit"></i>
                                                        {{ $category->Category_name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('manage.categories.update', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Caategory Name</label>
                                                            <input type="text" name="Category_name" class="form-control"
                                                                id="Category_name" value="{{ $category->Category_name }}">
                                                            @error('Category_name')
                                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-success"><i
                                                                class="fas fa-edit"></i>
                                                            category</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Category delete Modal -->
                                    <div class="modal fade" id="categoryDeleteModal{{ $category->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="categoryModalLabel" style="color: #ee5253"><i
                                                            class="fas fa-trash-alt"></i>
                                                        Do you want to Delete {{ $category->Category_name }} ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                
                                                <form action="{{ route('manage.categories.destroy', $category->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Category Name</label>
                                                            <input type="text" name="Category_name" class="form-control"
                                                                id="Category_name" value="{{ $category->Category_name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-danger"><i
                                                                class="fas fa-trash-alt"></i>
                                                            Category</button>
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
            @include('categories.partials.pagination')
        </div>
    </div>
@endsection