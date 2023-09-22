<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }


    public function index()
    {
        return view('books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', ['authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('/public/storage', $path_name);
        }

        Book::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'image' => $path_image,
            'pages' => $request->pages,
            'description' => $request->description,
            'year' => $request->year,
            'price' => $request->price,
            'author_id' => $request->author_id,
            'uri' => Str::slug($request->title, '-')
        ]);

        return redirect()->route('dashboard')->with('success', 'Libro aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $path_image = $book->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('/public/storage', $path_name);
        }

        $book->update([
            'title' => $request->title,
            'genre' => $request->genre,
            'image' => $path_image,
            'pages' => $request->pages,
            'description' => $request->description,
            'year' => $request->year,
            'price' => $request->price,
            'author_id' => $request->author_id,
            'uri' => Str::slug($request->title, '-')
        ]);

        return redirect()->route('dashboard')->with('success', 'Libro modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('dashboard')->with('success', 'Libro eliminato con successo');
    }
}