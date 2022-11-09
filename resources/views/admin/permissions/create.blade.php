@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('admin.partials.nav')

    <div class="container">

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
                <a href="{{ route('admin.permissions.index')}}" class="btn btn-sm btn-primary mb-2">Permissions Index</a>
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Permission</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Permissions" name="name">
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="submit">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
