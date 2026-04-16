<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:'.(date('Y') + 1),
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'pages' => 'required|integer|min:1',
            'language' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre' => $request->genre,
            'published_year' => $request->published_year,
            'isbn' => $request->isbn,
            'pages' => $request->pages,
            'language' => $request->language,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'is_available' => $request->has('is_available'),
            'cover_image' => $request->input('cover_image'),
        ];

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
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
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:'.(date('Y') + 1),
            'isbn' => 'required|string|max:20|unique:books,isbn,'.$book->id,
            'pages' => 'required|integer|min:1',
            'language' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre' => $request->genre,
            'published_year' => $request->published_year,
            'isbn' => $request->isbn,
            'pages' => $request->pages,
            'language' => $request->language,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'is_available' => $request->has('is_available'),
            'cover_image' => $request->input('cover_image'),
        ];

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
