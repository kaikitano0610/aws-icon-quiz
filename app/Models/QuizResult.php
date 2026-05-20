<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = [
        'correct_service_id',
        'selected_service_id',
        'is_correct'
    ];

    public function correctService()
    {
        return $this->belongsTo(AwsService::class, 'correct_service_id');
    }

    public function selected_service_id()
    {
        return $this->belongsTo(AwsService::class, 'selected_service_id');
    }
}
