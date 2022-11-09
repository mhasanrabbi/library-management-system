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
                <a href="{{ route('admin.roles.index')}}" class="btn btn-sm btn-primary mb-2">Roles Index</a>
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Role" name="name"  value="{{ $role->name }}">
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
