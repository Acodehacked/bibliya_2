<?php

namespace App\Http\Controllers;

use App\Models\VerseCategory;
use Illuminate\Http\Request;

class VerseCategoryController extends Controller
{
    public function index()
    {
        $categories = VerseCategory::all();
        return response()->json($categories);
    }

    /**
     * Store a new verse category.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:verse_categories,name|max:255',
            'description' => 'nullable|string',
        ]);

        $category = VerseCategory::create($request->all());
        return response()->json(['message' => 'Category created successfully', 'category' => $category], 201);
    }

    /**
     * Show a specific verse category.
     */
    public function show($id)
    {
        $category = VerseCategory::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update a specific verse category.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:verse_categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = VerseCategory::findOrFail($id);
        $category->update($request->all());
        return response()->json(['message' => 'Category updated successfully', 'category' => $category]);
    }

    /**
     * Delete a verse category.
     */
    public function destroy($id)
    {
        $category = VerseCategory::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
