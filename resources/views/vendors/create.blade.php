@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('vendors.partials.nav')

<div class="container">
        <div class="row">
            <div class="col">
                <h3>
                    Add Vendor
                </h3>
            </div>
        </div>

        @if($errors->any())
        <div class="row">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                    <ul>
                        <li>
                            {{$error}}
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <form action="{{route('vendors.store')}}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Mobile number " name="mobile">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter adress " name="address">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" placeholder="Enter website" name="website">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">SPOC Mobile(If have)</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Mobile number " name="spoc_mobile">
                    </div>
                    <div class="mb-2">
                        <label for="title" class="form-label">SPOC Email(If have)</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="spoc_email">
                    </div>
                                      
                    <div class="mb-2">
                        <button class="btn btn-primary" type="submit">
                            Add Vendor
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
    @endsection