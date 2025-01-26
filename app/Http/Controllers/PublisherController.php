<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a list of all publishers.
     */
    public function index()
    {
        $publishers = Publisher::all(); // Retrieve all publishers
        return response()->json($publishers);
    }

    /**
     * Store a new publisher.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name', // Publisher name must be unique
        ]);

        // Create a new publisher record
        $publisher = Publisher::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Publisher created successfully', 'publisher' => $publisher], 201);
    }

    /**
     * Show a specific publisher.
     */
    public function show($id)
    {
        // Find the publisher by ID or fail if not found
        $publisher = Publisher::findOrFail($id);
        return response()->json($publisher);
    }

    /**
     * Update a specific publisher.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name,' . $id, // Ensure name is unique but allow current name
        ]);

        // Find the publisher by ID
        $publisher = Publisher::findOrFail($id);
        $publisher->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Publisher updated successfully', 'publisher' => $publisher]);
    }

    /**
     * Delete a publisher.
     */
    public function destroy($id)
    {
        // Find and delete the publisher by ID
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response()->json(['message' => 'Publisher deleted successfully']);
    }
}
