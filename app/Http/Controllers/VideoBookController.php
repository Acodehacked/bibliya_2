<?php

namespace App\Http\Controllers;

use App\Models\VideoBook;
use Illuminate\Http\Request;

class VideoBookController extends Controller
{
    /**
     * Display a list of all video books.
     */
    public function index()
    {
        $videoBooks = VideoBook::with('publisher')->get(); // Load video books with publisher
        return response()->json($videoBooks);
    }

    /**
     * Store a new video book.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_link' => 'required|url',
            'publisher_id' => 'required|exists:publishers,id',
            'description' => 'nullable|string|max:500',
        ]);

        $videoBook = VideoBook::create($request->all());
        return response()->json(['message' => 'Video book created successfully', 'video_book' => $videoBook], 201);
    }

    /**
     * Show a specific video book.
     */
    public function show($id)
    {
        $videoBook = VideoBook::with('publisher')->findOrFail($id);
        return response()->json($videoBook);
    }

    /**
     * Update a specific video book.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_link' => 'required|url',
            'publisher_id' => 'required|exists:publishers,id',
            'description' => 'nullable|string|max:500',
        ]);

        $videoBook = VideoBook::findOrFail($id);
        $videoBook->update($request->all());
        return response()->json(['message' => 'Video book updated successfully', 'video_book' => $videoBook]);
    }

    /**
     * Delete a video book.
     */
    public function destroy($id)
    {
        $videoBook = VideoBook::findOrFail($id);
        $videoBook->delete();
        return response()->json(['message' => 'Video book deleted successfully']);
    }
}
