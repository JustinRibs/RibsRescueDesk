<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $hashedPass = bcrypt($data['password']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $hashedPass,
        ]);
        $user->save();
        auth()->login($user);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('users.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // authenticate user
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // check if inputs match records
        if(auth()->attempt($validated)){
            $request->session()->regenerate();
            // redirect to homepage
            return redirect('/');
        }
        // otherwise send them back
        return back()->withErrors(['message' => 'Invalid Credentials']);
    }

    // logoout
    public function logout(Request $request)
    {
        // logout
        auth()->logout();

        // invalidate the session
        $request->session()->invalidate();

        // regenerate token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
