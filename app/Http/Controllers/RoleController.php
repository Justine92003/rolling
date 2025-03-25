<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('roles.index', compact('users'));
    }

    public function create()
    {
        return view('roles.create'); // No roles to fetch
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('roles.index')->with('success', 'User  created successfully.');
    }

  
    public function edit(User $user)
    {
        return view('roles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('roles.index')->with('success', 'User  updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('roles.index')->with('success', 'User  deleted successfully.');
    }
}