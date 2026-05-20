<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwsServiceController;
// use App\Http\Controllers\QuizController;

// Route::get('/', [QuizController::class, 'index'])->name('home');

Route::get('aws-services', [AwsServiceController::class, 'index'])->name('aws-services.index');
Route::get('/aws-services/create', [AwsServiceController::class, 'create'])->name('aws-services.create');
Route::post('/aws-services',[AwsServiceController::class, 'store'])->name('aws-services.store');


Route::get('/quiz', function () {
    return 'クイズ画面はあとで作る';
})->name('quiz.show');
