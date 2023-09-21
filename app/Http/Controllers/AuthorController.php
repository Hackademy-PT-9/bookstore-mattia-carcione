<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    protected static $nationalities = [
        'italian' => 'Italiana',
        'american' => 'Americana',
        'british' => 'Inglese',
        'canadian' => 'Canadese',
        'swedish' => 'Svedese',
        'austrian' => 'Austriaca',
        'polish' => 'Polacca',
        'romanian' => 'Rumena',
        'portuguese' => 'Portoghese',
        'russian' => 'Russa',
        'finnish' => 'Finlandese',
        'swiss' => 'Svizzera',
        'norwegian' => 'Norvegese',
        'greek' => 'Greca',
        'croatian' => 'Croata',
        'czech' => 'Ceca',
        'belgian' => 'Belga',
        'german' => 'Tedesca',
        'chinese' => 'Cinese',
        'japanese' => 'Giapponese',
        'spanish' => 'Spagnola',
        'french' => 'Francese',
        'hungarian' => 'Ungherese',
        'dutch' => 'Olandese',
        'danoio' => 'Danese',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authors.index', ['authors' => Author::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create', ['nationalities' => self::$nationalities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'nationality' => $request->nationality,
        ]);

        return redirect()->route('authors.index')->with('success', 'Libro aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}