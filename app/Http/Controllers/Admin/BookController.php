<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index($language){
        if(in_array($language,['Bible','Other'])){
            $l = strtolower($language);
            return Inertia::render('Admin/Features/Books/index', [
                'books' => Book::where('type',$l)->with('publisher')->get(),
            ]);
        }
        return Response()->json(['message'=>'Invalid language'],404);
    }
}
