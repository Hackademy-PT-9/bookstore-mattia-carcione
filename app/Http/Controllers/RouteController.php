<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }
    public function home()
    {
        return view('homepage');
    }

    public function dashboard()
    {
        return view('template.dashboard', ['books' => Book::all(), 'authors' => Author::all(), 'users' => User::all()]);
    }
}