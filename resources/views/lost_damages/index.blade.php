@extends('layouts.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content">

        @include('partials.nav')

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
                    <h2>Books Track</h2>
                </div>
            </div>


            <div class="row">


                <div class="col">
                    <form class="form-inline" action="{{ route('admin.search.books') }}" method="POST">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            name="membership_id">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <table class="table table-striped table-hover table-bordered text-center mt-3">
                        <thead class="table bg-secondary text-white">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Borrow Date</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @unless(empty($bookInformations))
                                @foreach ($bookInformations as $key => $bookInformation)
                                    @foreach ($bookInformation->borrow_books as $borrow_book)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $borrow_book->book_id }}</td>
                                            <td>{{ $borrow_book->created_at }}</td>
                                            <td>{{ $bookInformation->name }}</td>
                                            <td>
                                                <button class="btn btn-primary">Process</button>
                                            </td>
                                        </tr>
                                    @endforeach
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
        </div>
    @endsection
