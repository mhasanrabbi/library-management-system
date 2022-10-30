@extends('layouts.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content">
        @include('partials.nav')
        <div class="container">

            <a href="{{ url('/rack') }}" class="btn btn-primary float-right mb-3 text-white"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>

            <form action="{{ route('save.rack') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="rack_name">Rack Name</label>
                    <input type="text" class="form-control" id="rack_name" name="rack_name" placeholder="Rack Name">
                </div>
                <div class="form-group">
                    <label for="max_capacity">Maximum Capacity</label>
                    <input type="number" class="form-control" id="max_capacity" name="max_capacity"
                        placeholder="Maximum Capacity" min="0" max="20">
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
