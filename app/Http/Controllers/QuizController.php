<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AwsService;
use App\Models\QuizResult;

class QuizController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        if (AwsService::count() < 4){
            return redirect()
                ->route('aws-services.index')
                ->with('message', 'AWSサービスの件数が4件以上じゃないとクイズを作ることができません。');
        }
        $correct = AwsService::inRandomOrder()->first();

        $choices = AwsService::where('id', '!=', $correct->id)
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->push($correct)
            ->shuffle();

        return view('quiz.show', [
            'correct' => $correct,
            'choices' => $choices
        ]);
    }

    public function answer(Request $request)
    {
        $validated = $request->validate([
            'correct_id' => ['required', 'exists:aws_services,id'],
            'answer_id' => ['required', 'exists:aws_services,id'],
        ]);

        $isCorrect = (int) $validated['correct_id'] === (int) $validated['answer_id'];

        $correct = AwsService::findOrFail($validated['correct_id']);
        $answer = AwsService::findOrFail($validated['answer_id']);

        QuizResult::create([
            'correct_service_id' => $correct->id,
            'selected_service_id' => $answer->id,
            'is_correct' => $isCorrect,
        ]);

        return view('quiz.result',[
            'isCorrect' => $isCorrect,
            'correct' => $correct,
            'answer' => $answer
        ]);
    }

    public function results()
    {
        $results = QuizResult::with(['correctService', 'selectedService'])
            ->latest()
            ->get();

        $total = $results->count();
        $correctCount = $results->where('is_correct', true)->count();
        $rate = $total > 0 ? round($correctCount / $total * 100, 1) : 0;

        return view('quiz.results', [
            'results' => $results,
            'total' => $total,
            'correctCount' => $correctCount,
            'rate' => $rate,
        ]);
    }
}
