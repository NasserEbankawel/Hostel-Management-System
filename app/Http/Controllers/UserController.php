<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Hash;
use App\Models\User;
use App\Mail\NewItemAdded;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', ['user' => new User]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed', // Password is required for new user
            'role' => 'required|in:super_admin,admin',
        ]);

        // Hash the password before saving
       //$data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Mail::to('recipient@example.com')->send(new NewItemAdded($user, 'user'));

        return redirect()->route('users.index')->with('alertMessage', "User {$data['fullname']} added successfully")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'fullname' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:super_admin,admin',
        ]);

        // Exclude password from being updated
        $user->update($data);

        return redirect()->route('users.index')->with('alertMessage', "User {$user->fullname} updated successfully")->with('type', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        
        $user->delete();
        return redirect()->route('users.index')->with('alertMessage', "User {$user->fullname} deleted successfully")->with('type', 'success');
    }
}

