<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // // Show the form for creating a new user.
    // public function create()
    // {
    //     return view('users.create');
    // }

    // // Store a newly created user in storage.
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $validatedData['password'] = bcrypt($validatedData['password']);

    //     $user = User::create($validatedData);

    //     return redirect()->route('users.index')->with('success', 'User created successfully.');
    // }

    // // Display the specified user.
    // public function show(User $user)
    // {
    //     return view('users.show', compact('user'));
    // }

    // // Show the form for editing the specified user.
    // public function edit(User $user)
    // {
    //     return view('users.edit', compact('user'));
    // }

    // // Update the specified user in storage.
    // public function update(Request $request, User $user)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //     ]);

    //     if ($request->filled('password')) {
    //         $validatedData['password'] = bcrypt($validatedData['password']);
    //     } else {
    //         unset($validatedData['password']);
    //     }

    //     $user->update($validatedData);

    //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
    // }

    // // Remove the specified user from storage.
    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    // }

    public function index () {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $valid_users = [
            ['email' => 'evelyn.aurelia@itbss.ac.id', 'password' => 'dulcisenak'],
            ['email' => 'kimberly.nathaneil@itbss.ac.id', 'password' => 'dulcisenak'],
            ['email' => 'valentino.chandra@itbss.ac.id', 'password' => 'dulcisenak'],
        ];

        $credentials = $request->only('email', 'password');

        foreach ($valid_users as $user) {
            if ($user['email'] == $credentials['email'] && $user['password'] == $credentials['password']) {
                $userModel = new User;
                $userModel->email = $user['email'];
                Auth::login($userModel);
                return redirect()->route('home');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}