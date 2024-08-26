<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller

{
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        // Create a new user using Eloquent
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Display a list of users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show a specific user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Update a specific user
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        // Find and update the user
        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
        ]);



        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }



    // Delete a specific user
    public function destroy($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or fail if not found
        return view('users.edit', compact('user')); // Return the edit view with the user data
    }

}
