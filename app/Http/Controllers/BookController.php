<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a new book.
     */
    public function store(Request $request)
    {
        $request->validate([
            'engl' => 'required|string|unique:books,english_name|max:255',
            'mal' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'max_chapters' => 'nullable|integer|min:1',
            'type' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
        ]);

        $book = Book::create($request->all());
        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    /**
     * Show a specific book.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    /**
     * Update a specific book.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'engl' => 'required|string|max:255|unique:books,english_name,' . $id,
            'mal' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'max_chapters' => 'nullable|integer|min:1',
            'type' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    /**
     * Delete a book.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
