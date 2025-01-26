<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\Request;

class VerseController extends Controller
{
    public function index()
    {
        $verses = Verse::with('category')->get();
        return response()->json($verses);
    }

    /**
     * Store a new verse.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book' => 'required|string',
            'chapter' => 'required|integer',
            'verse_number' => 'required|integer',
            'text' => 'required|string',
            'category_id' => 'required|exists:verse_categories,id',
        ]);

        $verse = Verse::create($request->all());
        return response()->json(['message' => 'Verse created successfully', 'verse' => $verse], 201);
    }

    /**
     * Show a specific verse.
     */
    public function show($id)
    {
        $verse = Verse::with('category')->findOrFail($id);
        return response()->json($verse);
    }

    /**
     * Update a specific verse.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book' => 'required|string',
            'chapter' => 'required|integer',
            'verse_number' => 'required|integer',
            'text' => 'required|string',
            'category_id' => 'required|exists:verse_categories,id',
        ]);

        $verse = Verse::findOrFail($id);
        $verse->update($request->all());
        return response()->json(['message' => 'Verse updated successfully', 'verse' => $verse]);
    }

    /**
     * Delete a verse.
     */
    public function destroy($id)
    {
        $verse = Verse::findOrFail($id);
        $verse->delete();
        return response()->json(['message' => 'Verse deleted successfully']);
    }
}
