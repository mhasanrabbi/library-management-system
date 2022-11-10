@extends('layouts.layout')
@section('content')

    <!-- Sidebar  -->
    <!-- Page Content  -->
    <div id="content">

        @include('partials.nav')
        <div>
            <h3>Publisher Add</h3>
            <br>
            <form action="{{ route('publisher.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Publisher Name</label>
                    <input name="publisher_name" type="Name" class="form-control" id="exampleFormControlInput1" placeholder="Publisher Name">
                    @error('publisher_name')
                        <p style="color:red">{{ $message }}</p> 
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-12">
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-3">
                            <button id="submit"class="btn btn-primary" type="submit">Add</button>
                            <a href="{{ route('publisher.index') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
