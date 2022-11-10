@extends('layouts.layout')
@section('content')

    <!-- Sidebar  -->
    <!-- Page Content  -->
    <div id="content">

        @include('partials.nav')
        
        <div>
            <div class="row">
                <div class="col-sm-11"><h4>Publisher list</h4></div>
                <div class="col-sm-1"><a class="btn btn-primary" href="{{ route('publisher.create') }}" role="button">+Add</a></div>
            </div>
            <br>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Publisher Name</th>
                        <th>Date & Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($publishers as $publisher)
                <tbody>
                    <tr>
                        <td>{{ $publisher['id']}}</td>
                        <td>{{ $publisher['publisher_name']}}</td>
                        <td>{{ $publisher['updated_at']->format('d-m-y H:i a');}}</td>
                        <td><a href="{{ url('/publisher/' .$publisher->id .'/edit') }}"><button type="button" class="btn btn-outline-primary">Edit</button></a></td>
                        <td><a href="{{route('publisher.delete', ['id' => $publisher->id])}}" onclick="return confirm('Weet je dit zeker?')"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        <!-- <td><a href=""></a></td> -->
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                    <!-- <tr>
                        <th>SL</th>
                        <th>Publisher Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr> -->
                </tfoot>
            </table>
        </div>
    </div>
@endsection
