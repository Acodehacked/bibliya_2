<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index($language)
    {
        if (in_array($language, ['Bible', 'Other'])) {
            $l = strtolower($language);
            return Inertia::render('Admin/Features/Books/list', [
                'books' => BookResource::collection(Book::where('type', $l)->with('publisher')->paginate(50)),
            ]);
        }
        return Response()->json(['message' => 'Invalid language'], 404);
    }
    public function table(Request $request, $language)
    {
        $sortColumn = $request->input('sort', 'id'); // Default to sorting by ID
        $sortDirection = $request->input('direction', 'asc'); // Default ascending
        $page = (int) $request->input('page', 1);
        $perPage = $request->input('perPage', 50);
        if (in_array($language, ['Bible', 'Other'])) {
            $l = strtolower($language);
            $companies = BookResource::collection(Book::where('type', $l)->with('publisher')->orderBy($sortColumn, $sortDirection)->paginate($perPage, ['id', 'eng_name', 'mal_name', 'max_chapters', 'publisher_id', 'from', 'type', 'is_active'], 'page', $page + 1));
            return response()->json($companies);
        }
    }
    public function activateAll(Request $request, $language)
    {
        $selected = $request->input('selectRows', []); // Default to sorting by ID
        Book::whereIn('id', $selected)->update(['is_active' => true]);
        return redirect()->back()->with('success', 'Updated Successfully');
    }
    public function deleteAll(Request $request, $language)
    {
        $selected = $request->input('selectRows', []); // Default to sorting by ID
        Book::whereIn('id', $selected)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
