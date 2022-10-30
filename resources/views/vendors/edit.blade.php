@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('vendors.partials.nav')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>
                    Edit: {{$vendor->name}}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Title" name="name"
                            value="{{$vendor->name}}">
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Mobile" name="mobile"
                            value="{{$vendor->mobile}}">
                    </div>
                   
                    <div class="mb-2">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Email" name="email"
                            value="{{$vendor->email}}">
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Address</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Address" name="address"
                            value="{{$vendor->address}}">
                    </div>
                                      
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection