<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwsServiceController;
use App\Http\Controllers\QuizController;


Route::get('aws-services', [AwsServiceController::class, 'index'])->name('aws-services.index');
Route::get('/aws-services/create', [AwsServiceController::class, 'create'])->name('aws-services.create');
Route::post('/aws-services',[AwsServiceController::class, 'store'])->name('aws-services.store');


Route::get('/', [QuizController::class, 'index'])->name('home');
Route::get('/quiz', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/quiz/answer', [QuizController::class, 'answer'])->name('quiz.answer');

Route::get('/quiz/results', [QuizController::class, 'results'])->name('quiz.results');
