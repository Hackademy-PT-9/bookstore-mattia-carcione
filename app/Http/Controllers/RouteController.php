<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected static $count = 1;
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
        return view('dashboards.dashboard', ['books' => Book::all(), 'authors' => Author::all(), 'users' => User::all(), 'count' => self::$count]);
    }
    public function profile()
    {
        return view('dashboards.profile');
    }
}