<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Models\User\UserAnswer;
use App\Models\User\UserProgress;
use Illuminate\Http\Request;

class BibliyaController extends Controller
{
    public function submitAnswers(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'answers' => 'required|array',
            'chapter_id' => 'required|exists:chapters,id',
            'start_time' => 'required|date', // Start time passed from frontend (e.g., UNIX timestamp or formatted date)
        ]);

        $startTime = new \Carbon\Carbon($request->start_time); // Convert start_time from request
        $endTime = now(); // Current time when the user submits the answers
        $timeTaken = $endTime->diffInSeconds($startTime); // Calculate the difference in seconds

        $totalScore = 0;
        $streak = 0;
        $timeBonus = 0;

        foreach ($request->answers as $answerData) {
            $question = Question::find($answerData['question_id']);
            $isCorrect = $question->answer == $answerData['user_answer'];

            if ($isCorrect) {
                $totalScore += 10; // Base score for correct answer
                $streak++; // Track streaks
            } else {
                $streak = 0; // Reset streak on wrong answer
            }

            // Time bonus for answering quickly
            if ($answerData['time_taken'] < 5) { // Assuming `time_taken` is passed in seconds for each answer
                $timeBonus += 5;
            }

            UserAnswer::create([
                'user_id' => $request->user_id,
                'question_id' => $answerData['question_id'],
                'user_answer' => $answerData['user_answer'],
                'is_correct' => $isCorrect,
            ]);
        }

        // Calculate total score with streak and time bonuses
        $totalScore += ($streak * 2) + $timeBonus;

        // Update user progress and level based on score
        $userProgress = UserProgress::updateOrCreate(
            ['user_id' => $request->user_id, 'chapter_id' => $request->chapter_id],
            ['score' => $totalScore, 'time_taken' => $timeTaken] // Save the time taken here
        );

        // Update the user's level and experience points
        $user = User::find($request->user_id);
        $user->experience_points += $totalScore;
        if ($user->experience_points >= 1000) {
            $user->level++;
            $user->experience_points = 0; // Reset XP after leveling up
        }
        $user->save();

        return response()->json([
            'total_score' => $totalScore,
            'streak' => $streak,
            'time_bonus' => $timeBonus,
            'time_taken' => $timeTaken // Send back the time taken in the response
        ]);
    }
}

//javascript
// Assuming you get the response data in a variable `data`
// let timeTakenInSeconds = data.time_taken;
// let minutes = Math.floor(timeTakenInSeconds / 60);
// let seconds = timeTakenInSeconds % 60;
// alert(`You took ${minutes} minutes and ${seconds} seconds to complete the quiz.`);

