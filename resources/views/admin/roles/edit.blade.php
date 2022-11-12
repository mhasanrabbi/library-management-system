@extends('layouts.layout')
@section('content')

<!-- Page Content  -->
<div id="content">

    @include('admin.partials.nav')

    <div class="container">
        @if (session('message'))
        <div class="row">
            <div class="col">
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            </div>
        </div>
        @endif
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
        <div class="row pt-2 bg-info">
            <div class="col">
                <h4>Roles Permission</h4>
                <div class="my-4">
                    @if($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                        <form method="POST"
                        action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm my-2">
                            {{ $role_permission->name}}
                        </button>
                        </form>
                        @endforeach
                    @endif
                </div>
                <div>
                    <form action="{{ route('admin.roles.permissions', $role->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="permission">Permission</label>
                                <select name="permission" id="permission">
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name}}">
                                        {{ $permission->name}}
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
