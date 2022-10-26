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
                                            <i class="fas fa-edit"></i>
                                        </td>
                                        <td>
                                            <i class="fas fa-trash-alt"></i>
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
