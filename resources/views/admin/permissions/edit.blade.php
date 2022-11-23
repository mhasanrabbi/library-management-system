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
                <a href="{{ route('admin.permissions.index')}}" class="btn btn-sm btn-primary mb-2">Permissions Index</a>
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Permissions" name="name"  value="{{ $permission->name }}">
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pt-2 bg-info">
            <div class="col">
                <h4>Roles</h4>
                <div class="my-4">
                    @if($permission->roles)
                        @foreach ($permission->roles as $permission_role)
                        <form method="POST"
                        action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm my-2">
                            {{ $permission_role->name}}
                        </button>
                        </form>
                        @endforeach
                    @endif
                </div>
                <div>
                    <form action="{{ route('admin.permissions.roles', $permission->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="roles">Roles</label>
                                <select name="roles" id="roles">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name}}">
                                        {{ $role->name}}
                                    </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                Assign
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
