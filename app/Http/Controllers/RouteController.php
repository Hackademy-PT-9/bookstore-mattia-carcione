<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected static $nationalities = [
        'italian' => 'Italia',
        'american' => 'America',
        'british' => 'Inghilterra',
        'canadian' => 'Canada',
        'swedish' => 'Svezia',
        'austrian' => 'Austria',
        'polish' => 'Polonia',
        'romanian' => 'Romania',
        'portuguese' => 'Portogallo',
        'russian' => 'Russia',
        'finnish' => 'Finlandia',
        'swiss' => 'Svizzera',
        'norwegian' => 'Norvegia',
        'greek' => 'Grecia',
        'croatian' => 'Croazia',
        'czech' => 'Repubblica Ceca',
        'belgian' => 'Belgio',
        'german' => 'Germania',
        'chinese' => 'Cina',
        'japanese' => 'Giappone',
        'spanish' => 'Spagna',
        'french' => 'Franciae',
        'hungarian' => 'Ungheria',
        'dutch' => 'Olanda',
        'danoio' => 'Danimarca',
        'nyoro' => 'Irlanda',
        'egyptian' => 'Egitto',
        'celloso' => 'Scozia',
        'prussia' => 'Prussia',
    ];
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

    public function profileEdit()
    {
        return view('user.edit', ['user' => auth()->user(), 'states' => self::$nationalities]);
    }
}