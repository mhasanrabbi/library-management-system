@extends('layouts.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content">
        @include('partials.nav')
        <div class="container">
            <a href="{{ url('/rack') }}" class="btn btn-primary float-right mb-3 text-white"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>
            <form action="{{ route('update.rack') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="{{ $rackTable->id }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rack Name</label>
                    <input type="text" class="form-control" id="rack_name" name="rack_name"
                        value="{{ $rackTable->rack_name }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Maximum Capacity</label>
                    <input type="number" class="form-control" id="max_capacity" name="max_capacity" min="0"
                        max="20" value="{{ $rackTable->max_capacity }}">
                </div>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </form>
        </div>
    </div>
@endsection
