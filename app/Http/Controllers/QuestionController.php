<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a list of all questions.
     */
    public function index()
    {
        $questions = Question::with('difficulty')->active()->get();
        return response()->json($questions);
    }

    /**
     * Store a new question.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'language' => 'required|in:mal,eng',
            'question_text' => 'required|string',
            'options' => 'required|array|min:3', // Ensure at least 2 options are provided
            'correct_answer' => 'required|string|in:' . implode(',', array_keys($request->options)),
            'difficulty_id' => 'nullable|exists:difficulties,id',
            'reference' => 'nullable|string',
            'explanation' => 'nullable|string',
        ]);

        $question = Question::create([
            'category' => $request->category,
            'language' => $request->language,
            'question_text' => $request->question_text,
            'options' => json_encode($request->options),
            'correct_answer' => $request->correct_answer,
            'difficulty_id' => $request->difficulty_id,
            'reference' => $request->reference,
            'explanation' => $request->explanation,
            'is_active' => true,
        ]);

        return response()->json(['message' => 'Question created successfully', 'question' => $question], 201);
    }
}
