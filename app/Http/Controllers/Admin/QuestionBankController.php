<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Question;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionBankController extends Controller
{
    //
    public function index($language){
        if(in_array($language,['Bible','Other'])){
            $l = strtolower($language);
            return Inertia::render('Admin/Features/QuestionBank/index', [
                'questions' => Question::with('book'),
            ]);
        }
        return Response()->json(['message'=>'Invalid language'],404);
    }
}
