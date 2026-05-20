<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwsService extends Model
{
    protected $fillable = [
        'name',
        'category',
        'icon_path',
        'description'
    ];

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class, 'correct_service_id');
    }
}
