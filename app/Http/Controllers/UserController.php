<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit()
    {
        return view('user.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'name' =>'required|max:255',
            'username' =>'required|min:5|max:255|unique:users,username,'.auth()->user()->id,
            'email' =>'required|email|max:255|unique:users,email,'.auth()->user()->id,
            'password' => '<PASSWORD>'
        ]);
        if ($request->lead_in == null) {
            $attributes['lead_in'] = 0;
        }
        
        auth()->user()->update($attributes);
        return redirect('/posts/index');
    }

}