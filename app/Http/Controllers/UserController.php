<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        dd($user->hasPermissionTo($request->permission));

        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    // public function destroy(User $user)
    // {
    //     dd(User::all()->except(auth()->id()));
    //     // dd($user);
    //     if ($user->hasRole('admin')) {

    //         return back()->with('message', 'You are an Admin.');
    //     }
    //     User::where('id', $request->id)->delete();
    //     // $user->delete();

    //     return back()->with('message', 'User deleted.');
    // }

    public function destroy(User $user)
    {
        dd($user);
        if ($user->hasRole('admin')) {
            return back()->with('message', 'You are an admin');
        }
        // User::where('id', $request->id)->delete();
        $user->delete();

        return back()->with('message', 'User deleted');
        }
}