<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images');
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
            'uri' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo');
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
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $path_image = $book->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images');
        }

        Book::update([
            'title' => $request->title,
            'genre' => $request->genre,
            'image' => $path_image,
            'pages' => $request->pages,
            'description' => $request->description,
            'year' => $request->year,
            'price' => $request->price,
            'author_id' => $request->author_id,
            'uri' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('books.index')->with('success', 'Libro modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Libro eliminato con successo');
    }
}
