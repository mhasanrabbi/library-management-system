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
                <a href="{{ route('admin.users.index')}}" class="btn btn-sm btn-primary mb-2">Users Index</a>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <p class="text-info">User Name: {{$user->name}}</p>
                <p class="text-info">User Email: {{$user->email}}</p>
            </div>
        </div>

        <div class="row my-2">
            <div class="col">
                @if($user->roles)
                Has Role:
                    @foreach ($user->roles as $user_role)
                        <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id ])}}" onsubmit="return confirm('Are you sure?');" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm my-2">
                            {{ $user_role->name}}
                        </button>
                        </form>
                    @endforeach
                    @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('admin.users.roles', $user->id)}}" method="POST">
                @csrf
                <label for="role">
                    Roles
                </label>
                <select name="role" id="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{$role->name}}</option>
                    @endforeach
                </select>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Assign
                    </button>
                </div>
                </form>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col">
                @if($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                        <form action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id ])}}" onsubmit="return confirm('Are you sure?');" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            {{ $user_permission->name}}
                        </button>
                        </form>
                    @endforeach
                    @endif
            </div>
        </div> --}}


        {{-- <div class="row">
            <div class="col">
                <form action="{{ route('admin.users.permissions', $user->id)}}" method="POST">
                @csrf
                <label for="permission">
                    Permissions
                </label>
                <select name="role" id="role">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}">{{$permission->name}}</option>
                    @endforeach
                </select>
                <div>
                    <button type="submit">
                        Assign
                    </button>
                </div>
                </form>
            </div>
        </div> --}}

    </div>

    @endsection
